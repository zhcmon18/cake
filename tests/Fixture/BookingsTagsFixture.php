<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsTagsFixture
 *
 */
class BookingsTagsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'booking_id' => ['autoIncrement' => null, 'type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'tag_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_indexes' => [
            'idx_tag_id' => ['type' => 'index', 'columns' => ['tag_id'], 'length' => []],
            'idx_booking_id' => ['type' => 'index', 'columns' => ['booking_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['booking_id', 'tag_id'], 'length' => []],
            'sqlite_autoindex_bookings_tags_1' => ['type' => 'unique', 'columns' => ['booking_id', 'tag_id'], 'length' => []],
            'tag_id_fk' => ['type' => 'foreign', 'columns' => ['tag_id'], 'references' => ['tags', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'booking_id_fk' => ['type' => 'foreign', 'columns' => ['booking_id'], 'references' => ['bookings', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'booking_id' => 1,
                'tag_id' => 1
            ],
        ];
        parent::init();
    }
}
