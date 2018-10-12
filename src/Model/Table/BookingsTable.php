<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookings Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\CarsTable|\Cake\ORM\Association\BelongsTo $Cars
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Booking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Booking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Booking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BookingsTable extends Table
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

        $this->setTable('bookings');
        $this->setDisplayField('description');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Translate', ['fields' => ['description']]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cars', [
            'foreignKey' => 'car_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsToMany('Tags', [
            'foreignKey' => 'booking_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'bookings_tags'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('current_km')
            ->requirePresence('current_km', 'create')
            ->notEmpty('current_km');

        $validator
        ->integer('car_id')
        ->requirePresence('car_id', 'create')
        ->notEmpty('car_id');

        $validator
            ->dateTime('date_service')
            ->requirePresence('date_service', 'create')
            ->notEmpty('date_service');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['car_id'], 'Cars'));

        return $rules;
    }
    
    public function findTagged(Query $query, array $options) {
        $columns = [
            'Bookings.id', 'Bookings.user_id', 'Bookings.client_id',
            'Bookings.car_id', 'Bookings.current_km', 'Bookings.date_service',
            'Bookings.payment_received', 'Bookings.description', 
            'Bookings.created', 'Bookings.modified',
        ];

        $query = $query
                ->select($columns)
                ->distinct($columns);

        if (empty($options['tags'])) {
            // If there are no tags provided, find bookings that have no tags.
            $query->leftJoinWith('Tags')
                    ->where(['Tags.title IS' => null]);
        } else {
            // Find bookings that have one or more of the provided tags.
            $query->innerJoinWith('Tags')
                    ->where(['Tags.title IN' => $options['tags']]);
        }

        return $query->group(['Bookings.id']);
    }
    
    public function beforeSave($event, $entity, $options) {
        if ($entity->tag_string) {
            $entity->tags = $this->_buildTags($entity->tag_string);
        }
    }

    protected function _buildTags($tagString) {
        // Trim tags
        $newTags = array_map('trim', explode(',', $tagString));
        // Remove all empty tags
        $newTags = array_filter($newTags);
        // Reduce duplicated tags
        $newTags = array_unique($newTags);

        $out = [];
        $query = $this->Tags->find()
                ->where(['Tags.title IN' => $newTags]);

        // Remove existing tags from the list of new tags.
        foreach ($query->extract('title') as $existing) {
            $index = array_search($existing, $newTags);
            if ($index !== false) {
                unset($newTags[$index]);
            }
        }
        // Add existing tags.
        foreach ($query as $tag) {
            $out[] = $tag;
        }
        // Add new tags.
        foreach ($newTags as $tag) {
            $out[] = $this->Tags->newEntity(['title' => $tag]);
        }
        return $out;
    }
}
