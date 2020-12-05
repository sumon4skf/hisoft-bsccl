<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class ProductsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('products');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsTo('Categories',[
            'foreignKey'=>'category_id'
        ]);

        $this->addBehavior('Timestamp');
    }

}
