<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class EventsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('events');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users',[
            'foreignKey'=>'user_id'
        ]);

        $this->addBehavior('Timestamp');
    }

}
