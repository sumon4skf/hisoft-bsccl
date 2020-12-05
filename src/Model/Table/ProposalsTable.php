<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class ProposalsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('proposals');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

}
