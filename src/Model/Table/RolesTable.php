<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Auth\DefaultPasswordHasher;


class RolesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {

        parent::initialize($config);
        $this->addBehavior('Timestamp');
        $this->hasMany('AccessPermissions', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
    }


    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('title', 'notBlank', [
                'rule' => 'notBlank',
                'message' => __('You need to provide a title'),
            ])
            ->add('alias', 'notBlank', [
                'rule' => 'notBlank',
                'message' => __('You need to provide a title'),
            ]);

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['title']));
        $rules->add($rules->isUnique(['alias']));

        return $rules;
    }

   /* public function beforeFind($event, $query)
    {
        return $query->where(['Roles.id !=' => 1]);
    }*/
}
