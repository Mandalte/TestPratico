<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InboxsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InboxsTable Test Case
 */
class InboxsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InboxsTable
     */
    public $Inboxs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inboxs',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Inboxs') ? [] : ['className' => 'App\Model\Table\InboxsTable'];
        $this->Inboxs = TableRegistry::get('Inboxs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Inboxs);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
