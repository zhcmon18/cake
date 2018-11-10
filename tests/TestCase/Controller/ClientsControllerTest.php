<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ClientsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\ClientsController Test Case
 */
class ClientsControllerTest extends IntegrationTestCase
{

    public $AuthAdmin;
    public $AuthSuper;
    public $Clients;
    public $Cars;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->Clients = TableRegistry::get('Clients');
        $this->Cars = TableRegistry::get('Cars');

        $usersTable = TableRegistry::get('users');
        $userAdmin = $usersTable->find('all', ['conditions' => ['Users.role' => 'admin']])->first()->toArray();
        $userSuper = $usersTable->find('all', ['conditions' => ['Users.role' => 'supervisor']])->first()->toArray();
        $this->AuthAdmin = [
            'Auth' => [
                'User' => $userAdmin
            ]
        ];
        $this->AuthSuper = [
            'Auth' => [
                'User' => $userSuper
            ]
        ];
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthAdmin);
        unset($this->AuthSuper);
        unset($this->Clients);
        unset($this->Cars);

        parent::tearDown();
    }

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clients',
        'app.bookings',
        'app.cars',
        'app.promotions',
        'app.subscriptions',
        'app.users'
    ];

    /**
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorized()
    {
        $this->session($this->AuthSuper);

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/clients/delete/1');

        $this->assertSession('You are not authorized to access that location.', 'Flash.flash.0.message');
    }

    /**
     * Test findClients method
     *
     * @return void
     */
    public function testFindClients()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->session($this->AuthAdmin);

        $this->get('/clients');

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->session($this->AuthAdmin);

        $this->get('/clients/view/1');

        //echo $this->_response->body();
        $this->assertResponseContains('Test Name One');
        $this->assertResponseOk();
    }

    /**
     * Test viewCars method
     *
     * @return void
     */
    public function testViewCars()
    {
        $this->session($this->AuthAdmin);

        $cars = $this->Cars->find('all', ['conditions' => ['Cars.client_id' => 1]]);

        $this->get('/clients/view-cars/1');

        foreach ($cars as $car) {
            $this->assertResponseContains($car->license);
        }
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session($this->AuthAdmin);

        $this->get('/clients/add');

        $this->assertResponseOk();

        $data = [
            'id' => 4,
            'promotion_id' => 1,
            'name' => 'Test Name Four',
            'slug' => 'Test-Name-Four',
            'telephone' => '450-444-4444',
            'address' => 'Test Four Street',
            'email' => 'testfour@mail.com',
            'created' => null,
            'modified' => null,
            'active' => 1
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/clients/add', $data);

        //echo $this->_response->body();
        $this->assertResponseSuccess();

        $query = $this->Clients->find('all', ['conditions' => ['Clients.id' => $data['id']]]);
        $this->assertNotEmpty($query);
    }

    /**
     * Test add method unathorized
     *
     * @return void
     */
    public function testAddUnauthenticatedFail() {
        $this->get('/clients/add');

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login', 'redirect' => '/clients/add']);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session($this->AuthAdmin);

        $newName = 'Test Client Edit';

        $client = $this->Clients->find('all')->first();
        $client->name = $newName;

        $clientId = $client->id;

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/clients/edit/' . $clientId, $client->toArray());

        //echo $this->_response->body();
        $this->assertResponseSuccess();

        $query = $this->Clients->find('all', ['conditions' => ['Clients.id' => $clientId]])->first();

        $this->assertEquals($newName, $query->name);

    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session($this->AuthAdmin);

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/clients/delete/1');

        $this->assertResponseSuccess();

        $query = $this->Clients->find('all', ['conditions' => ['Clients.id' => 1]])->first();

        $this->assertEmpty($query);
    }

    /**
     * Test getSubscriptions method
     *
     * @return void
     */
    public function testGetSubscriptions()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getPromotions method
     *
     * @return void
     */
    public function testGetPromotions()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getIdSubscription method
     *
     * @return void
     */
    public function testGetIdSubscription()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
