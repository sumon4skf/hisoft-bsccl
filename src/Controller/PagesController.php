<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\Auth;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;


class PagesController extends AppController
{

    public $components = array('Common');

    public $helpers = array('Html', 'Form');


    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['aboutUs']);
    }

    public function display(){
        $this->redirect('/home');
    }

    public function home(){

        $this->Events = TableRegistry::get('Events');
        $this->Agendas = TableRegistry::get('Agendas');
        $this->AgendaVotes = TableRegistry::get('AgendaVotes');

        $events = $this->Events->find('All')
            ->where(['Events.status'=>1])
            ->contain(['Users'])
            ->order(['Events.event_date' => 'DESC', 'Events.event_time' => 'DESC', 'Events.id' => 'DESC'])
            ->toArray();

        $current_date = date('Y-m-d');

        $next_event = $this->Events->find()
            ->where(['Events.type'=>'live', 'Events.status'=>1, 'Events.event_date >='=>$current_date])
            ->order(['Events.event_date' => 'ASC'])
            ->first();

        if(empty($next_event)){
            $next_event = $this->Events->find()
                ->where(['Events.type'=>'live', 'Events.status'=>1])
                ->order(['Events.event_date' => 'ASC'])
                ->first();
        }

        $agenda = $this->Agendas->find()
            ->where(['Agendas.status'=>1])
            ->order(['Agendas.weight' => 'ASC'])
            ->toArray();

//        $agenda_list = array();
//
//        if(!empty($agenda)){
//            foreach($agenda as $k=>$v){
//                $agenda_list[$k] = $v;
//                $agenda_list[$k]['votes'] = $this->getVoteResult($v['id']);
//            }
//        }

        $current_agenda = $this->Agendas->find()
            ->where(['Agendas.status'=>1, 'Agendas.is_active'=>1])
            ->contain(['ProposedUser', 'SecondedUser'])
            ->first();

        $comment = $this->getComments();

        $this->set('next_event', $next_event);
        $this->set('agenda', $agenda);
        $this->set('comment', $comment);
        $this->set('current_agenda', $current_agenda);
        $this->set('events', $events);

    }

    public function aboutUs(){

    }

    public function news(){

    }

    public function newsDetails(){

    }
//    public function gallery(){
//
//        $this->Galleries = TableRegistry::get('Galleries');
//
//        $galleries = $this->Galleries->find()->where(['status'=>1])->contain('GalleryImages')->toArray();
//
//        $this->set('galleries', $galleries);
//
//        $this->set('common', $this->Common);
//
//    }
//
//    public function galleryDetails($type = null, $id = null){
//        $this->Galleries = TableRegistry::get('Galleries');
//
//        $galleries = $this->Galleries->find()->where(['Galleries.id'=>$id])->contain('GalleryImages')->first();
//
//        //debug($galleries); die;
//
//        $this->set('galleries', $galleries);
//    }
//
//    public function galleryContents(){
//
//    }

    public function downloadMessageFile() {
        $this->autoRender = false;
        $fileName = 'RSM 6pp DL_February 2017.pdf';
        $path = WWW_ROOT . DS . 'uploads' . DS . 'files' . DS . $fileName;

        $this->response->file($path, array('download' => true));
        return $this->response;
    }

    public function joinMeeting(){
        $this->Events = TableRegistry::get('Events');
        $current_date = date('Y-m-d');

        $next_event = $this->Events->find()
            ->where(['Events.status'=>1, 'Events.event_date >='=>$current_date])
            ->order(['Events.event_date' => 'ASC'])
            ->first();

        $this->set('next_event', $next_event);

    }

    public function getComments(){
        $this->loadModel('ChatMessages');

        $current_date = date('Y-m-d');
        $messages = $this->ChatMessages->find()
            ->where(['ChatMessages.status'=>1, 'ChatMessages.created >='=>$current_date . ' 00:00:00', 'ChatMessages.created <='=>$current_date . ' 23:59:59'])
            ->contain(['Users'])
            ->order(['ChatMessages.id'=>'DESC'])
            ->toArray();

        $data = [];

        if(!empty($messages)){
            $message_last = $this->ChatMessages->find()
                ->where(['ChatMessages.status'=>1, 'ChatMessages.created >='=>$current_date . ' 00:00:00', 'ChatMessages.created <='=>$current_date . ' 23:59:59'])
                ->contain(['Users'])
                ->order(['ChatMessages.id'=>'DESC'])
                ->first();

            if(!empty($message_last)){
                $this->request->session()->write('message.last_id', $message_last->id);
            }

            foreach ($messages as $k=>$v){
                $boid_current = $this->request->session()->read('Auth.User.boid');
                if($boid_current == $v['user']->boid){
                    $boid = 'me';
                }else{
                    $boid = $v['user']->boid;
                }
                $data[$k]['boid'] = $boid;
                $data[$k]['name'] = $v['full_name'];
                $data[$k]['message'] = $v['message'];
                $data[$k]['created'] = date('d-m-Y g:i A', strtotime($v['created']));
            }
        }

        return $data;
    }

    public function getVoteResult($id){
        $this->loadModel('AgendaVotes');
        $agendaVotes = $this->AgendaVotes->find()
            ->where(['AgendaVotes.agenda_id' => $id])
            ->contain(['Users'])
            ->toArray();

        if (!empty($agendaVotes)) {
            $total_votes = 0;
            $accepted_votes = 0;
            $declined_votes = 0;
            foreach ($agendaVotes as $v) {
                $total_votes = $total_votes + $v->user->shares;
                if ($v->type == 'declined') {
                    $declined_votes = $declined_votes + $v->user->shares;
                } else {
                    $accepted_votes = $accepted_votes + $v->user->shares;
                }
            }

            $a_vote = ($accepted_votes * 100) / $total_votes;
            $d_vote = ($declined_votes * 100) / $total_votes;

            $a_vote = number_format($a_vote, 2) . '%';
            $d_vote = number_format($d_vote, 2) . '%';

            $response = array(
                'favor_vote'=>$a_vote,
                'accepted_votes'=>$accepted_votes,
                'against_vote'=>$d_vote,
                'declined_votes'=>$declined_votes
            );

            return json_encode($response);
        }
    }

    public function largeView(){
        $this->Events = TableRegistry::get('Events');
        $current_date = date('Y-m-d');

        $next_event = $this->Events->find()
            ->where(['Events.type'=>'live', 'Events.status'=>1, 'Events.event_date >='=>$current_date])
            ->order(['Events.event_date' => 'ASC'])
            ->first();

        //debug($next_event); die;

        $this->set('next_event', $next_event);
    }

}
