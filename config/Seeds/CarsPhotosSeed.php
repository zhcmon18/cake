<?php
use Migrations\AbstractSeed;

/**
 * CarsPhotos seed.
 */
class CarsPhotosSeed extends AbstractSeed
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
                'car_id' => '1',
                'photo_id' => '1',
            ],
            [
                'id' => '2',
                'car_id' => '2',
                'photo_id' => '2',
            ],
            [
                'id' => '3',
                'car_id' => '5',
                'photo_id' => '3',
            ],
            [
                'id' => '4',
                'car_id' => '4',
                'photo_id' => '5',
            ],
            [
                'id' => '5',
                'car_id' => '3',
                'photo_id' => '4',
            ],
        ];

        $table = $this->table('cars_photos');
        $table->insert($data)->save();
    }
}
