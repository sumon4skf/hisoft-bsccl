<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class AgendaVotesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('agenda_votes');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users',[
            'foreignKey'=>'user_id'
        ]);

        $this->belongsTo('Agendas',[
            'foreignKey'=>'agenda_id'
        ]);
    }

}
