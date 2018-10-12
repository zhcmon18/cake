<?php
use Migrations\AbstractSeed;

/**
 * CarsFiles seed.
 */
class CarsFilesSeed extends AbstractSeed
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
                'file_id' => '1',
            ],
            [
                'id' => '2',
                'car_id' => '2',
                'file_id' => '2',
            ],
            [
                'id' => '3',
                'car_id' => '5',
                'file_id' => '3',
            ],
            [
                'id' => '4',
                'car_id' => '4',
                'file_id' => '5',
            ],
            [
                'id' => '5',
                'car_id' => '3',
                'file_id' => '4',
            ],
        ];

        $table = $this->table('cars_files');
        $table->insert($data)->save();
    }
}
