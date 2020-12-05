<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();



        $this->set('loadDashboardScript', false);

        $username_type = '';

        if(!empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin'){
            $username_type = 'email';
        }elseif(!empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'council'){
            $username_type = 'username';
        }elseif(!empty($this->request->params['controller']) && ($this->request->params['controller'] == 'Users' || $this->request->params['action'] == 'login')){
            $username_type = 'boid';
        }

        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => $username_type,
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);

        //$this->Auth->allow(['display']);

        $total_logged_users = $this->getLoginUsers();

        $this->set('total_logged_users', $total_logged_users);
    }

    public function isAuthorized()       // Checking is admin or not
    {
        if(!empty($this->request->params['prefix']) && !empty($this->Auth->user())) {
            if (($this->request->params['prefix'] == 'admin' || $this->request->params['prefix'] == 'council') && ($this->Auth->user('role_id') == 1 || $this->Auth->user('role_id') == 2)) {
                return true;
            }elseif(!empty($this->request->params['controller']) && ($this->request->params['controller'] == 'Users' || $this->request->params['action'] == 'login')){
                return true;
            }
            else {
                $this->redirect('/');
            }
        }
    }



    public function beforeRender(Event $event)
    {

        $this->loadComponent('Auth');

        $this->isAuthorized();

        //$site_mode = 'maintenance';
        $site_mode = 'live';

        if ($site_mode == 'maintenance') {
            $this->viewBuilder()->layout('maintenance');
            return true;
        }

        $this->set('loadjQueryUIScript',false);
        $this->set('loadEditorScript',false);
        $this->set('authUser', $this->Auth->user());


        if (!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])) {
            $this->set('_serialize', true);
        }
        if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin' && $this->request->params['action'] != 'login') {
            $this->viewBuilder()->layout('admin');
        } elseif (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'council' && $this->request->params['action'] != 'login' && $this->request->params['action'] != 'summonsPrint') {
            $this->viewBuilder()->layout('council');
        }

        if($this->request->is('ajax')){
            $this->viewBuilder()->layout('ajax');
        }
    }

    function getLoginUsers(){
        $this->loadModel('Users');
        $total_users = $this->Users->find()
            ->where(['Users.is_login'=>1])
            ->count();
        return $total_users;
    }

}
