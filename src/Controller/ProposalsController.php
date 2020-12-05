<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class ProposalsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([
            'proposed', 'seconded'
        ]);
    }

    public function initialize()
    {
        parent::initialize();
    }

    public function proposed()
    {
        $this->autoRender = false;

        $is_seconded = $this->Proposals->find()
            ->where(['user_id' => $this->request->data['user_id'], 'type'=>'seconded'])
            ->count();

        if($is_seconded > 0){
            echo 'Sorry! You are not allow. You have already seconded.';
            die;
        }

        $proposal = $this->Proposals->find()
            ->where(['user_id' => $this->request->data['user_id'], 'type'=>'proposed'])
            ->first();

        if(!empty($proposal)){
            echo 'Already accepted.';
        }else{
            $data = [];
            $data['user_id'] = $this->request->data['user_id'];
            $data['type'] = 'proposed';

            $new_proposal = $this->Proposals->newEntity();
            $new_proposal = $this->Proposals->patchEntity($new_proposal, $data);
            if($this->Proposals->save($new_proposal)){
                echo 'Accepted.';
            }
        }

        die;

    }

    public function seconded()
    {
        $this->autoRender = false;

        $is_proposed = $this->Proposals->find()
            ->where(['user_id' => $this->request->data['user_id'], 'type'=>'proposed'])
            ->count();

        if($is_proposed > 0){
            echo 'Sorry! You are not allow. You have already proposed.';
            die;
        }

        $proposal = $this->Proposals->find()
            ->where(['user_id' => $this->request->data['user_id'], 'type'=>'seconded'])
            ->first();

        if(!empty($proposal)){
            echo 'Already accepted.';
        }else{
            $data = [];
            $data['user_id'] = $this->request->data['user_id'];
            $data['type'] = 'seconded';

            $new_proposal = $this->Proposals->newEntity();
            $new_proposal = $this->Proposals->patchEntity($new_proposal, $data);
            if($this->Proposals->save($new_proposal)){
                echo 'Accepted.';
            }
        }

        die;

    }

}
