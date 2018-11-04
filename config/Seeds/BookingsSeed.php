<?php
use Migrations\AbstractSeed;

/**
 * Bookings seed.
 */
class BookingsSeed extends AbstractSeed
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
                'id' => '1',
                'user_id' => '2',
                'client_id' => '1',
                'car_id' => '1',
                'current_km' => '120456',
                'date_service' => '2018-10-11 15:00:00',
                'payment_received' => '1',
                'description' => 'Problème avec le moteur.',
                'created' => '2018-10-11 15:43:40',
                'modified' => '2018-11-03 16:53:34',
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'client_id' => '1',
                'car_id' => '2',
                'current_km' => '74577',
                'date_service' => '2018-10-13 12:15:00',
                'payment_received' => '1',
                'description' => 'Changement de pneus.',
                'created' => '2018-10-11 22:08:23',
                'modified' => '2018-10-11 22:12:29',
            ],
            [
                'id' => '3',
                'user_id' => '1',
                'client_id' => '2',
                'car_id' => '3',
                'current_km' => '45006',
                'date_service' => '2018-10-16 18:00:00',
                'payment_received' => '0',
                'description' => 'Le panneau central ne fonctionne pas.',
                'created' => '2018-10-11 22:19:41',
                'modified' => '2018-10-11 22:23:29',
            ],
            [
                'id' => '4',
                'user_id' => '1',
                'client_id' => '2',
                'car_id' => '3',
                'current_km' => '56789',
                'date_service' => '2018-10-17 17:00:00',
                'payment_received' => '0',
                'description' => 'Fuite d\'huile',
                'created' => '2018-10-11 22:27:27',
                'modified' => '2018-10-11 22:28:29',
            ],
            [
                'id' => '5',
                'user_id' => '3',
                'client_id' => '3',
                'car_id' => '5',
                'current_km' => '32000',
                'date_service' => '2018-10-18 10:00:00',
                'payment_received' => '0',
                'description' => 'Changement de pneus.',
                'created' => '2018-10-11 22:39:36',
                'modified' => '2018-10-11 22:40:38',
            ],
        ];

        $table = $this->table('bookings');
        $table->insert($data)->save();
    }
}
