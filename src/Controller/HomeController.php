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
        
        $this->paginate = [
            'order' => [ 
                'bookings.date_service' => 'desc'
            ]
        ];

        $bookings = $this->paginate($bookingsTable);

        $this->set(compact('bookings'));
    }

}