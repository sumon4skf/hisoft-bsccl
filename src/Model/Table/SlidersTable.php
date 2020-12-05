<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class SlidersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('sliders');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

}
