<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class ChatMessagesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('chat_messages');
        $this->displayField('message');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users',[
            'foreignKey'=>'user_id'
        ]);

//        $this->hasMany('OrderProducts')
//            ->foreignKey('order_id');
    }

}
