<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 *
 * @property \App\Model\Table\PublishersTable|\Cake\ORM\Association\BelongsTo $Publishers
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsToMany $Categories
 * @property \App\Model\Table\WritersTable|\Cake\ORM\Association\BelongsToMany $Writers
 *
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, callable $callback = null, $options = [])
 */
class BooksTable extends Table
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

        $this->setTable('books');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Publishers', [
            'foreignKey' => 'publisher_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Categories', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'books_categories'
        ]);
        $this->belongsToMany('Writers', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'writer_id',
            'joinTable' => 'books_writers'
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
            ->scalar('uid')
            ->maxLength('uid', 64)
            ->requirePresence('uid', 'create')
            ->notEmpty('uid');

        $validator
            ->scalar('title')
            ->maxLength('title', 150)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('cover')
            ->maxLength('cover', 100)
            ->allowEmpty('cover');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->integer('year')
            ->allowEmpty('year');

        $validator
            ->requirePresence('publisher_id', 'create')
            ->notEmpty('publisher_id')
            ->integer('publisher_id');

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
        $rules->add($rules->existsIn(['publisher_id'], 'Publishers'));

        return $rules;
    }
}
