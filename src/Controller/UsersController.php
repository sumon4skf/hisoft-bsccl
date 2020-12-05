<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Auth\Auth;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Log\Log;

class UsersController extends AppController
{
  public $components = ['EmailHandler', 'Common'];

  public $paginate = [
    'limit' => 100
  ];
  public function initialize()
  {
    parent::initialize();
    $this->Auth->allow([
      'logout',
      'login',
      'UsersOTP',
      'guest',
      'forgotPassword',
      'changePassword',
      'signUp',
      'profile',
      'councilDetails',
      'councils'
    ]);
  }

  public function index()
  {
  }

  public function login()      // Backend login
  {
    $this->viewBuilder()->layout('userLoginLayout');
    if (!$this->Auth->user()) {
      if ($this->request->is('post')) {
        $user_data = $this->request->data;
        $user_void = $user_data['boid'];
        $userTable = TableRegistry::get('Users');
        $query = $userTable->find('all')->where(['boid' => $user_void])->first();

        if ($query) {
          $otpTable = TableRegistry::get('otp');
          $otp_data = $otpTable->find('all')->where('status IS NULL')->order(['id' => 'asc'])->first();
          $otp_data->boid = $user_void;
          $otp_data->mobileno = $query->phone;
          $otp_data->status = 0;

          if ($otpTable->save($otp_data)) {
            $data = [
              'id' => $otp_data->id,
              'boid' => $user_void,
              'name' => $user_data['name'],
              'shares' => $user_data['shares'],
              'phone' => $otp_data->phone,
              'otp_enable' => true
            ];
            $this->set('data', $data);
          } else {
            return $this->redirect('/');
          }
        }
      }
    } else {
      return $this->redirect('/');
    }
  }



  public function usersOtp()
  {
    $data['otp_enable'] = false;
    $this->set('data', $data);

    if (!$this->request->is('post')) {
      return $this->redirect('/');
    }

    $id = $this->request->data['id'];
    $boid = $this->request->data['boid'];
    $otp = $this->request->data['otp'];

    $otpTable = TableRegistry::get('otp');
    $otp_data = $otpTable->find('all')->where(["id" => $id, "boid" => $boid, "otpcode" => $otp, "status" => 0])->first();

    if (!$otp_data) {
      return $this->redirect('/');
    }

    $otp_data->status = 1;
    if (!$otpTable->save($otp_data)) {
      return $this->redirect('/');
    }
    $user = $this->Auth->identify();
    if ($this->userRoleCheck($this->request->data)) {
      $user = $this->Auth->identify();
      if ($user && $this->userRoleCheck($this->request->data)) {
        $this->Auth->setUser($user);
        $this->updateIsLogin(true);
        //$success_message = __('Successfully logged in');
        //$this->Flash->adminSuccess($success_message, ['key' => 'admin_success']);
        return $this->redirect('/');
      } else {
        $data['otp_enable'] = false;
        $error_message = __('Invalid username or password, try again');
        $this->Flash->adminError($error_message, ['key' => 'admin_error']);
        $this->Flash->error($error_message);
      }
    }

    return $this->redirect('/');
  }






  public function signUp()
  {
    $this->viewBuilder()->layout('userLoginLayout');

    $user = $this->Users->newEntity();
    if ($this->request->is('post')) {
      $user = $this->Users->patchEntity($user, $this->request->data);
      $user->role_id = '3';
      $user->username = $this->request->data['email'];
      if ($this->Users->save($user)) {

        $this->sendSignupEmail($user);        //for email send

        $success_message = __('The user registration is successful.');
        $this->Flash->adminSuccess($success_message, ['key' => 'admin_success']);
        return $this->redirect(['action' => 'index']);
      } else {
        $error_message = __('The user could not be saved. Please, try again.');
        $this->Flash->adminError($error_message, ['key' => 'admin_error']);
      }
    }

    $this->set('user', $user);
  }

  public function guest()
  {
    $this->viewBuilder()->layout('userLoginLayout');

    $user = $this->Users->newEntity();
    if ($this->request->is('post')) {
      $user = $this->Users->patchEntity($user, $this->request->data);
      $user->role_id = '6';
      $user->username = $this->request->data['email'];
      $user->password = 'guest#99';
      if ($this->Users->save($user)) {

        $this->sendSignupEmail($user);        //for email send

        $success_message = __('The guest user registration is successful.');
        $this->Flash->adminSuccess($success_message, ['key' => 'admin_success']);
        return $this->redirect(['action' => 'index']);
      } else {
        $error_message = __('The guest user could not be saved. Please, try again.');
        $this->Flash->adminError($error_message, ['key' => 'admin_error']);
      }
    }

    $this->set('user', $user);
  }

  private function userRoleCheck($user_data)
  {     // Checking user is admin or not
    if (!empty($user_data['boid'])) {
      $user_void = $user_data['boid'];
      $userTable = TableRegistry::get('Users');
      $query = $userTable->find('all')->where(['boid' => $user_void]);
      if (!empty($query->first()->role_id) && $query->first()->role_id == 3) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  private function adminApprovalCheck($user_data)
  {     // Checking user by admin approval
    if (!empty($user_data['email'])) {
      $user_email = $user_data['email'];
      $userTable = TableRegistry::get('Users');
      $query = $userTable->find('all')->where(['email' => $user_email]);
      if (!empty($query->first()->approval_status) && $query->first()->approval_status == true) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function logout()  // Backend logout
  {
    $this->Flash->adminSuccess('You are loggedout', ['key' => 'admin_success']);
    //$this->updateIsLogin();
    $this->Auth->logout();
    $this->request->session()->destroy();
    return $this->redirect('/login');
  }

  function resetPassword($user_id = null)
  {  // Admin reset password

    if ($this->request->is('post')) {

      if ($this->request->data['password'] == $this->request->data['confirm_password']) {

        $user_id = $this->request->data['user_id'];
        $userTable = TableRegistry::get('Users');
        $user_data = $userTable->get($user_id);
        $user_data->id = $user_id;
        $user_data->password = $this->request->data['password'];

        if ($userTable->save($user_data)) {
          $this->Flash->adminSuccess('Password changed successfully', ['key' => 'admin_success']);
          $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
      } else {
        $this->Flash->adminError('Password and Confirm Password does not match', ['key' => 'admin_error']);
        $this->redirect(array('controller' => 'users', 'action' => 'resetPassword'));
      }
    }

    $this->set('user_id', $user_id);
  }

  function forgotPassword()
  {

    //$this->viewBuilder()->layout('loginLayout');

    if ($this->request->is('post')) {

      $post_data = $this->request->data();

      if (!empty($post_data['email'])) {

        $email = $post_data['email'];
        $user_info = $this->Users->find()->where(['Users.email' => $email])->first();

        if (!empty($user_info)) {

          $user_info['token'] = $this->generateToken();
          $user_info['token_generated'] = date("Y-m-d H:i:s");

          if ($this->Users->save($user_info)) {

            $this->userPasswordChangeLinkEmailSend($user_info);

            $this->Flash->adminSuccess('A reset password link has sent to your email address', ['key' => 'admin_success']);
            //$this->redirect(array('controller' => 'users', 'action' => 'forgotPassword'));
          }
        } else {
          //echo 'fsef';exit;
          $this->Flash->adminError('Email does not exist', ['key' => 'admin_error']);
          //$this->redirect(array('controller' => 'users', 'action' => 'forgotPassword'));
        }
      } else {


        $error_message = __('Invalid username or password, try again');
        $this->Flash->adminError($error_message, ['key' => 'admin_error']);
        //$this->redirect(array('controller' => 'users', 'action' => 'forgotPassword'));

      }
    }

    $this->render('forgot_password');
  }

  private function userPasswordChangeLinkEmailSend($user)
  {

    $message = [];
    $footerMessage = [];
    array_push($message, 'Please go to this link to change your password');

    $site_email = 'test@gmail.com';
    //$site_email = $this->Common->getSettingByKey('site_email');
    $to = $user['email'];
    $subject = 'Password Reset Link';
    $site_link = Router::url('/', true) . 'users/change_password/' . $user['token'];

    $to_email                       =   $to;
    $fromemail                      =   $site_email;
    $post_data['user']              =   $user;
    $post_data['site_link']         =   $site_link;
    $post_data['message']           =   $message;
    $post_data['footerMessage']     =   $footerMessage;
    $subject                        =   $subject;

    $this->EmailHandler->sendMail($fromemail, $to_email, $subject, 'forget_password_link',  $post_data);
  }

  private function sendSignupEmail($user)
  {

    $message = [];
    $footerMessage = [];
    array_push($message, 'Welcome to abbl.com');

    $site_email = 'info@abbl.com';
    //$site_email = $this->Common->getSettingByKey('site_email');
    $to = $user['email'];
    $subject = 'Welcome email';

    $to_email                       =   $to;
    $fromemail                      =   $site_email;
    $post_data['user']              =   $user;
    $post_data['message']           =   $message;
    $post_data['footerMessage']     =   $footerMessage;
    $subject                        =   $subject;

    $this->EmailHandler->sendMail($fromemail, $to_email, $subject, 'sign_up_welcome_mail',  $post_data);
  }


  public function changePassword($token = null)
  {

    //$this->viewBuilder()->layout('loginLayout');

    if ($this->request->is('post')) {

      if (empty($token))
        $token = $this->request->data['token'];


      if ($this->request->session()->check('Auth.User.id')) {
        $user_info = $this->Users->find()->where(['Users.id' => $this->request->session()->read('Auth.User.id')])->first();
      } else {
        $user_info = $this->Users->find()->where(['Users.token' => $token])->first();
      }

      if (!empty($user_info)) {
        if (strlen($this->request->data['password']) > 1) {
          if ($this->request->data['password'] == $this->request->data['confirm_password']) {

            $user_info['password'] = $this->request->data['password'];
            $user_info['confirm_password'] = $this->request->data['confirm_password'];

            if ($this->Users->save($user_info)) {
              if ($this->request->session()->check('Auth.User.id')) {
                $this->Flash->success('Password has been change successfully.', ['key' => 'admin_success']);
                return $this->redirect('/profile');
              } else {
                $this->Flash->success('Password has been reset successfully, You may login now', ['key' => 'admin_success']);
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
              }
            } else {
              $message = 'Password could not be reset!, Please try again';
              $this->Flash->error($message, ['key' => 'admin_error']);
            }
          } else {
            $message = 'Password didn\'t match with confirm password!';
            $this->Flash->error($message, ['key' => 'admin_error']);
          }
        } else {
          $message = 'Password must have a mimimum of 2 characters!';
          $this->Flash->error($message, ['key' => 'admin_error']);
        }
      } else {
        $message = 'User does not exist';
        $this->Flash->error($message, ['key' => 'admin_error']);
      }
    }

    $this->set('token', $token);

    $this->render('change_password');
  }

  private function generateToken()
  {
    return Text::uuid();
  }

  public function profile()
  {
  }

  function updateIsLogin($status = 0)
  {
    if (!empty($status)) {
      $login_date_time = date('Y-m-d H:i:s');
    } else {
      $login_date_time = NULL;
    }
    $user = $this->Users->get($this->request->session()->read('Auth.User.id'));
    $user->is_login = $status;
    $user->login_date_time = $login_date_time;
    $this->Users->save($user);
  }
}
