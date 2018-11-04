<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClientsFixture
 *
 */
class ClientsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'promotion_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'slug' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'telephone' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'address' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'email' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
                'id' => 2,
                'promotion_id' => 2,
                'name' => 'Test Name Two',
                'slug' => 'Test-Name-Two',
                'telephone' => '450-222-2222',
                'address' => 'Test two Street',
                'email' => 'testtwo@mail.com',
                'created' => null,
                'modified' => null,
                'active' => 0
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
        parent::init();
    }
}
