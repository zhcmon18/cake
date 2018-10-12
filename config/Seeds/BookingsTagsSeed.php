<?php
use Migrations\AbstractSeed;

/**
 * BookingsTags seed.
 */
class BookingsTagsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'booking_id' => '1',
                'tag_id' => '1',
            ],
            [
                'booking_id' => '2',
                'tag_id' => '3',
            ],
            [
                'booking_id' => '3',
                'tag_id' => '2',
            ],
            [
                'booking_id' => '4',
                'tag_id' => '1',
            ],
            [
                'booking_id' => '4',
                'tag_id' => '4',
            ],
            [
                'booking_id' => '5',
                'tag_id' => '3',
            ],
        ];

        $table = $this->table('bookings_tags');
        $table->insert($data)->save();
    }
}
