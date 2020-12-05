<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

class EventsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow();
    }

    public function initialize()
    {
        parent::initialize();
        //$this->loadComponent('Common');
    }

    public function index()
    {
        $events = $this->Events->find('All')->where(['Events.status'=>1])->contain(['Users'])->order(['Events.event_date' => 'DESC', 'Events.event_time' => 'DESC', 'Events.id' => 'DESC'])->toArray();

        $this->set('events', $events);
    }

    public function success(){
        $this->request->session()->delete('event_booking_id');
    }

}
