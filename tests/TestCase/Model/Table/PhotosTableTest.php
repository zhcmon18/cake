<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhotosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhotosTable Test Case
 */
class PhotosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhotosTable
     */
    public $PhotosTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.photos',
        'app.cars'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Photos') ? [] : ['className' => PhotosTable::class];
        $this->PhotosTable = TableRegistry::getTableLocator()->get('Photos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PhotosTable);

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
}
