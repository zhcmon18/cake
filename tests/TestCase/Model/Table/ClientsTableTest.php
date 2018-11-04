<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * App\Model\Table\ClientsTable Test Case
 */
class ClientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientsTable
     */
    public $Clients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clients',
        'app.bookings',
        'app.cars',
        'app.promotions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Clients') ? [] : ['className' => ClientsTable::class];
        $this->Clients = TableRegistry::getTableLocator()->get('Clients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Clients);

        parent::tearDown();
    }

    /**
     * Test findActive method
     *
     * @return void
     */
    public function testFindActive()
    {
        $query = $this->Clients->find('active');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'promotion_id' => 1,
                'name' => 'Test Name One',
                'slug' => 'Test-Name-One',
                'telephone' => '450-111-1111',
                'address' => 'Test One Street',
                'email' => 'testone@mail.com',
                'created' => null,
                'modified' => null,
                'active' => 1
            ],
            [
                'id' => 3,
                'promotion_id' => 3,
                'name' => 'Test Name Three',
                'slug' => 'Test-Name-Three',
                'telephone' => '450-333-3333',
                'address' => 'Test three Street',
                'email' => 'testthree@mail.com',
                'created' => null,
                'modified' => null,
                'active' => 1
            ]
        ];

        $this->assertEquals($expected, $result);
    }

    public function testSaving() {
        $data = [
            'id' => 4,
            'promotion_id' => 4,
            'name' => 'Test Name Four',
            'slug' => 'Test-Name-Four',
            'telephone' => '450-444-444',
            'address' => 'Test four Street',
            'email' => 'testfour@mail.com',
            'created' => null,
            'modified' => null,
            'active' => 1
        ];

        $client = $this->Clients->newEntity($data);

        $countBeforeSave = $this->Clients->find()->count();

        $this->Clients->save($client);

        $countAfterSave = $this->Clients->find()->count();

        $this->assertEquals($countAfterSave, $countBeforeSave + 1);
    }

    public function testEditing() {
        $client = $this->Clients->find('all', ['conditions' => ['active' => false]])->first();

        $client->active = true;

        $this->Clients->save($client);

        $this->assertEquals(true, $client->active);
    }

    public function testDeleting() {
        $countBeforeDelete = $this->Clients->find()->count();

        $client = $this->Clients->find()->first();

        $this->Clients->delete($client);

        $countAfterDelete = $this->Clients->find()->count();

        $this->assertEquals($countAfterDelete, $countBeforeDelete - 1);
    }


    public function testValidateEmailOK () {
        $client = $this->Clients->find('all')->first()->toArray();

        $errors = $this->Clients->validationDefault(new Validator())->errors($client);

        $this->assertTrue(empty($errors));
    }

    public function testValidateEmailFail () {
        $client = $this->Clients->find('all')->first()->toArray();
        $client['email'] = @mail.ca;

        $errors = $this->Clients->validationDefault(new Validator())->errors($client);

        $this->assertTrue(!empty($errors['email']));
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

    /**
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
