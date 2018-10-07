<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class HomeController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    public function index() {
        $bookingsTable = TableRegistry::get('bookings');
        $bookings = $bookingsTable->find('all');

        $this->set('bookings', $bookings);
    }

}