<?php
namespace App\Controller\Component;

use  Cake\Controller\Component;
use Cake\Mailer\Email;

class EmailHandlerComponent extends Component
{
    public $components = ['Common'];

    public function smtpEmailSetting()
    {

//        $smtp_username = $this->Common->getSettingByKey('smtp_username');
//        $smtp_password = $this->Common->getSettingByKey('smtp_password');
//
//        if(empty($smtp_username) || empty($smtp_password)){
//
//            //$smtp_username = 'http://abbl.com/';
//            //$smtp_password = 'asdfadf';
//
//        }

//        Email::configTransport('gmail', [
//            'host' => 'ssl://smtp.gmail.com',
//            'port' => 465,
//            'username' => $smtp_username,
//            'password' => $smtp_password,
//            'className' => 'Smtp'
//        ]);
    }



    public function sendMail($from='', $to, $subject, $template='', $variables=array(),$attachments=array(),  $format='html', $htmldt='', $bcc=array())
    {

        $email = new Email();
        $email->transport('gmail');

        $form = 'info@abbl.com';
        //$form = ($from!='')?$from:Configure::read("Site.email");

        $email->from($form);
        $email->to($to);
        if(!empty($bcc))
            $email->cc(array($bcc => $bcc));
        $email->subject($subject);
        $email->template($template);
        $email->viewVars(['variables' => $variables]);
        if(!empty($attachments))$email->attachments($attachments);
        $email->emailFormat($format);
        if($htmldt!='' && $template== ''){
            if($email->send($htmldt))return true;
        }
        else{
            if($email->send($htmldt))return true;;
        }
    }
}