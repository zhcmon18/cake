<?php
use Migrations\AbstractSeed;

/**
 * Promotions seed.
 */
class PromotionsSeed extends AbstractSeed
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
                'id' => '2',
                'subscription_id' => '3',
                'name' => 'Changement des pneus',
            ],
            [
                'id' => '3',
                'subscription_id' => '4',
                'name' => 'Changement d\'huile',
            ],
            [
                'id' => '4',
                'subscription_id' => '3',
                'name' => 'Inspection',
            ],
            [
                'id' => '5',
                'subscription_id' => '3',
                'name' => 'Reparation des freins',
            ],
            [
                'id' => '6',
                'subscription_id' => '4',
                'name' => 'Diagnostic',
            ],
            [
                'id' => '7',
                'subscription_id' => '4',
                'name' => 'Alignement des pneus',
            ],
            [
                'id' => '8',
                'subscription_id' => '5',
                'name' => 'Échappement',
            ],
            [
                'id' => '9',
                'subscription_id' => '5',
                'name' => 'Entretien préventif',
            ],
        ];

        $table = $this->table('promotions');
        $table->insert($data)->save();
    }
}
