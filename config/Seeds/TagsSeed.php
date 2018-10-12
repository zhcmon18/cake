<?php
use Migrations\AbstractSeed;

/**
 * Tags seed.
 */
class TagsSeed extends AbstractSeed
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
                'title' => 'Moteur',
                'created' => '2018-10-11 15:39:20',
                'modified' => '2018-10-11 22:29:16',
            ],
            [
                'id' => '2',
                'title' => 'Electrique',
                'created' => '2018-10-11 15:40:10',
                'modified' => '2018-10-11 22:25:15',
            ],
            [
                'id' => '3',
                'title' => 'Pneus',
                'created' => '2018-10-11 15:41:07',
                'modified' => '2018-10-11 22:41:53',
            ],
            [
                'id' => '4',
                'title' => 'Huile',
                'created' => '2018-10-11 15:42:17',
                'modified' => '2018-10-11 22:29:06',
            ],
        ];

        $table = $this->table('tags');
        $table->insert($data)->save();
    }
}
