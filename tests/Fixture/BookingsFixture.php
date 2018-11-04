<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsFixture
 *
 */
class BookingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'client_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'car_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'current_km' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'date_service' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'payment_received' => ['type' => 'tinyinteger', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'description' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_indexes' => [
            'idx_client_id' => ['type' => 'index', 'columns' => ['client_id'], 'length' => []],
            'idx_car_id' => ['type' => 'index', 'columns' => ['car_id'], 'length' => []],
            'idx_user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'client_id_fk' => ['type' => 'foreign', 'columns' => ['client_id'], 'references' => ['clients', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'car_id_fk' => ['type' => 'foreign', 'columns' => ['car_id'], 'references' => ['cars', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'user_id_fk' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'client_id' => 1,
                'car_id' => 1,
                'current_km' => 10000,
                'date_service' => null,
                'payment_received' => 1,
                'description' => 'Test description One',
                'created' => null,
                'modified' => null
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'client_id' => 2,
                'car_id' => 2,
                'current_km' => 15000,
                'date_service' => null,
                'payment_received' => 0,
                'description' => 'Test description Two',
                'created' => null,
                'modified' => null
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'client_id' => 3,
                'car_id' => 3,
                'current_km' => 20000,
                'date_service' => null,
                'payment_received' => 1,
                'description' => 'Test description Three',
                'created' => null,
                'modified' => null
            ]
        ];
        parent::init();
    }
}
