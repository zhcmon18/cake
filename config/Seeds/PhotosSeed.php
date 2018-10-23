<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class PhotosSeed extends AbstractSeed
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
                'name' => 'bmwE38.jpg',
                'path' => 'Files/',
                'created' => '2018-10-11 22:45:53',
                'modified' => '2018-10-11 22:45:53',
                'status' => '1',
            ],
            [
                'id' => '2',
                'name' => 'nissanPath.jpg',
                'path' => 'Files/',
                'created' => '2018-10-11 22:48:41',
                'modified' => '2018-10-11 22:48:41',
                'status' => '1',
            ],
            [
                'id' => '3',
                'name' => 'corolla2017.jpg',
                'path' => 'Files/',
                'created' => '2018-10-11 22:54:31',
                'modified' => '2018-10-11 22:54:31',
                'status' => '1',
            ],
            [
                'id' => '4',
                'name' => 'GT2017.jpg',
                'path' => 'Files/',
                'created' => '2018-10-11 22:54:47',
                'modified' => '2018-10-11 22:54:47',
                'status' => '1',
            ],
            [
                'id' => '5',
                'name' => 'Gti2017.jpg',
                'path' => 'Files/',
                'created' => '2018-10-11 22:55:01',
                'modified' => '2018-10-11 22:55:01',
                'status' => '1',
            ],
        ];

        $table = $this->table('photos');
        $table->insert($data)->save();
    }
}
