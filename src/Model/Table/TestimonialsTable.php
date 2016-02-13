<?php
namespace App\Model\Table;

use App\Model\Entity\Testimonial;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Testimonials Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Businesses
 */
class TestimonialsTable extends Table
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

        $this->table('testimonials');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Businesses', [
            'foreignKey' => 'business_id'
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
            ->allowEmpty('client_name');

        $validator
            ->allowEmpty('client_email');

        $validator
            ->allowEmpty('hash');

        $validator
            ->add('rating', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('rating');

        $validator
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['business_id'], 'Businesses'));
        return $rules;
    }
}
