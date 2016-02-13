<?php
namespace App\Model\Table;

use App\Model\Entity\Matchteam;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matchteams Model
 *
 * @property \Cake\ORM\Association\HasMany $Guests
 * @property \Cake\ORM\Association\HasMany $Hosts
 */
class MatchteamsTable extends Table
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

        $this->table('matchteams');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Guests', [
            'foreignKey' => 'matchteam_id'
        ]);
        $this->hasMany('Hosts', [
            'foreignKey' => 'matchteam_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('clubname');

        $validator
            ->requirePresence('matchdate', 'create')
            ->notEmpty('matchdate');

        $validator
            ->allowEmpty('formation');

        $validator
            ->allowEmpty('goals');

        return $validator;
    }
}
