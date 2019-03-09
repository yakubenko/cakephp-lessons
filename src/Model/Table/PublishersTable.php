<?php
namespace App\Model\Table;

use App\Model\Util\ImagerUtility;
use ArrayObject;
use Cake\Database\Schema\TableSchema;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Publishers Model
 *
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\HasMany $Books
 *
 * @method \App\Model\Entity\Publisher get($primaryKey, $options = [])
 * @method \App\Model\Entity\Publisher newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Publisher[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Publisher|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publisher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Publisher[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Publisher findOrCreate($search, callable $callback = null, $options = [])
 */
class PublishersTable extends Table
{
    protected function _initializeSchema(TableSchema $schema)
    {
        $schema->setColumnType('logotype', 'file');

        return $schema;
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('publishers');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Books', [
            'foreignKey' => 'publisher_id'
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
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('logotype');

        $validator->add('logotype', 'valid-image', [
            'rule' => ['extension', ['jpg', 'jpeg']],
            'message' => __('Only JPEG images are allowed')
        ]);

        $validator
            ->scalar('description')
            ->maxLength('description', 350, __('Слишком длинное описание'))
            ->allowEmpty('description');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        return $rules;
    }

    public function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        $oldLogotype = ($entity->isNew()) ? null : $entity->getOriginal('logotype');

        if (!empty($entity->logotype['tmp_name']) && is_uploaded_file($entity->logotype['tmp_name'])) {
            try {
                $imager = new ImagerUtility();
                $imager->avatarsDir = WWW_ROOT . DS . 'uploads' . DS;
                $name = $imager->generateMd5Filename($entity->logotype['tmp_name']) . '.jpg';
                $imager->resizeAvatar($entity->logotype['tmp_name'], $name);

                $entity->set('logotype', $name);
            } catch (\Exception $e) {
                Log::debug($e->getMessage());
                $entity->set('logotype', $oldLogotype);
            }
        } else {
            $entity->set('logotype', $oldLogotype);
        }
    }
}
