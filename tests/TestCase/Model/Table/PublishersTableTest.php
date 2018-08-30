<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublishersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublishersTable Test Case
 */
class PublishersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PublishersTable
     */
    public $Publishers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.publishers',
        'app.books'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Publishers') ? [] : ['className' => PublishersTable::class];
        $this->Publishers = TableRegistry::get('Publishers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Publishers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
