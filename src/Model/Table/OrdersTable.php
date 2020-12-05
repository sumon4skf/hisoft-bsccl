<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class OrdersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('orders');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users',[
            'foreignKey'=>'user_id'
        ]);

        $this->hasMany('OrderProducts')
            ->foreignKey('order_id');
    }

}
