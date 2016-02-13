<?php
namespace App\Model\Table;

use App\Model\Entity\Guest;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Guests Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Matchteams
 * @property \Cake\ORM\Association\BelongsToMany $Hosts
 */
class GuestsTable extends Table
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

        $this->table('guests');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Matchteams', [
            'foreignKey' => 'matchteam_id'
        ]);
        $this->belongsToMany('Hosts', [
            'foreignKey' => 'guest_id',
            'targetForeignKey' => 'host_id',
            'joinTable' => 'hosts_guests'
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
            ->add('primary_squad', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('primary_squad');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('yellow');

        $validator
            ->allowEmpty('red');

        $validator
            ->allowEmpty('substitution');

        $validator
            ->allowEmpty('goals');

        $validator
            ->allowEmpty('rating');

        $validator
            ->allowEmpty('assist');

        $validator
            ->allowEmpty('injuries');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['matchteam_id'], 'Matchteams'));
        return $rules;
    }
}
