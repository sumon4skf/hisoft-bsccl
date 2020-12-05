<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class AgendasTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('agendas');
        $this->displayField('agenda');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

//        $this->belongsTo('Users',[
//            'foreignKey'=>'proposed'
//        ]);

        $this->belongsTo( 'ProposedUser', [
            'foreignKey' => 'proposed',
            'className' => 'Users'
        ]);

        $this->belongsTo( 'SecondedUser', [
            'foreignKey' => 'seconded',
            'className' => 'Users'
        ]);
    }

}
