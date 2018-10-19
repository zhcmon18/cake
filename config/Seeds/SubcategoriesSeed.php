<?php
use Migrations\AbstractSeed;

/**
 * Subcategories seed.
 */
class SubcategoriesSeed extends AbstractSeed
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
                'category_id' => '3',
                'name' => 'Changement des pneus',
            ],
            [
                'id' => '3',
                'category_id' => '4',
                'name' => 'Changement d\'huile',
            ],
            [
                'id' => '4',
                'category_id' => '3',
                'name' => 'Inspection',
            ],
            [
                'id' => '5',
                'category_id' => '3',
                'name' => 'Reparation des freins',
            ],
            [
                'id' => '6',
                'category_id' => '4',
                'name' => 'Diagnostic',
            ],
            [
                'id' => '7',
                'category_id' => '4',
                'name' => 'Alignement des pneus',
            ],
            [
                'id' => '8',
                'category_id' => '5',
                'name' => 'Échappement',
            ],
            [
                'id' => '9',
                'category_id' => '5',
                'name' => 'Entretien préventif',
            ],
        ];

        $table = $this->table('subcategories');
        $table->insert($data)->save();
    }
}
