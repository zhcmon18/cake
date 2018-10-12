<?php
use Migrations\AbstractSeed;

/**
 * Cars seed.
 */
class CarsSeed extends AbstractSeed
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
                'client_id' => '1',
                'license' => 'AAA444',
                'model' => 'BMW E38 2012',
                'color' => 'Noire',
                'created' => '2018-10-11 15:27:44',
                'modified' => '2018-10-11 22:46:17',
            ],
            [
                'id' => '2',
                'client_id' => '1',
                'license' => 'BBB333',
                'model' => 'Nissan Pathfinder 2017',
                'color' => 'Vert',
                'created' => '2018-10-11 15:34:44',
                'modified' => '2018-10-11 22:50:01',
            ],
            [
                'id' => '3',
                'client_id' => '2',
                'license' => 'CCC456',
                'model' => 'Volkswagen GT 2017',
                'color' => 'Blanc',
                'created' => '2018-10-11 15:35:50',
                'modified' => '2018-10-11 22:55:38',
            ],
            [
                'id' => '4',
                'client_id' => '2',
                'license' => 'CCC345',
                'model' => 'Volkswagen GTI 2017',
                'color' => 'Blanc',
                'created' => '2018-10-11 15:36:25',
                'modified' => '2018-10-11 22:55:33',
            ],
            [
                'id' => '5',
                'client_id' => '3',
                'license' => 'GAD435',
                'model' => 'Toyota Corolla 2017',
                'color' => 'Gris',
                'created' => '2018-10-11 15:38:18',
                'modified' => '2018-10-11 22:55:13',
            ],
        ];

        $table = $this->table('cars');
        $table->insert($data)->save();
    }
}
