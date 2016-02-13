<?php
namespace App\Model\Table;

use App\Model\Entity\Player;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Players Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Teams
 * @property \Cake\ORM\Association\BelongsTo $Matches
 */
class PlayersTable extends Table
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

        $this->table('players');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id'
        ]);
        $this->belongsTo('Matches', [
            'foreignKey' => 'match_id'
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
            ->allowEmpty('squad_number');

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
            ->allowEmpty('penalty_failed');

        $validator
            ->allowEmpty('penalty_keeped');

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
        $rules->add($rules->existsIn(['team_id'], 'Teams'));
        $rules->add($rules->existsIn(['match_id'], 'Matches'));
        return $rules;
    }
}
