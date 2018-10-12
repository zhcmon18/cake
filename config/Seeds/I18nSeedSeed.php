<?php
use Migrations\AbstractSeed;

/**
 * I18nSeed seed.
 */
class I18nSeedSeed extends AbstractSeed
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
                'locale' => 'en_US',
                'model' => 'Tags',
                'foreign_key' => '1',
                'field' => 'title',
                'content' => 'Motor',
            ],
            [
                'id' => '2',
                'locale' => 'ru',
                'model' => 'Tags',
                'foreign_key' => '1',
                'field' => 'title',
                'content' => 'Мотор',
            ],
            [
                'id' => '3',
                'locale' => 'en_US',
                'model' => 'Tags',
                'foreign_key' => '2',
                'field' => 'title',
                'content' => 'Electric',
            ],
            [
                'id' => '4',
                'locale' => 'ru',
                'model' => 'Tags',
                'foreign_key' => '2',
                'field' => 'title',
                'content' => 'Электрика',
            ],
            [
                'id' => '5',
                'locale' => 'en_US',
                'model' => 'Tags',
                'foreign_key' => '3',
                'field' => 'title',
                'content' => 'Tires',
            ],
            [
                'id' => '6',
                'locale' => 'ru',
                'model' => 'Tags',
                'foreign_key' => '3',
                'field' => 'title',
                'content' => 'Колеса',
            ],
            [
                'id' => '7',
                'locale' => 'en_US',
                'model' => 'Tags',
                'foreign_key' => '4',
                'field' => 'title',
                'content' => 'Oil',
            ],
            [
                'id' => '8',
                'locale' => 'ru',
                'model' => 'Tags',
                'foreign_key' => '4',
                'field' => 'title',
                'content' => 'Масло',
            ],
            [
                'id' => '9',
                'locale' => 'en_US',
                'model' => 'Bookings',
                'foreign_key' => '1',
                'field' => 'description',
                'content' => 'Problem with the motor.',
            ],
            [
                'id' => '11',
                'locale' => 'ru',
                'model' => 'Bookings',
                'foreign_key' => '1',
                'field' => 'description',
                'content' => 'Проблема с мотором.',
            ],
            [
                'id' => '15',
                'locale' => 'en_US',
                'model' => 'Bookings',
                'foreign_key' => '2',
                'field' => 'description',
                'content' => 'Tires change.',
            ],
            [
                'id' => '16',
                'locale' => 'en_US',
                'model' => 'Tags',
                'foreign_key' => '9',
                'field' => 'title',
                'content' => 'Tires',
            ],
            [
                'id' => '17',
                'locale' => 'ru',
                'model' => 'Bookings',
                'foreign_key' => '2',
                'field' => 'description',
                'content' => 'Замена колес.',
            ],
            [
                'id' => '18',
                'locale' => 'ru',
                'model' => 'Bookings',
                'foreign_key' => '3',
                'field' => 'description',
                'content' => 'Центральная панель не работает.',
            ],
            [
                'id' => '19',
                'locale' => 'en_US',
                'model' => 'Bookings',
                'foreign_key' => '3',
                'field' => 'description',
                'content' => 'The dashboard is not working.',
            ],
            [
                'id' => '22',
                'locale' => 'en_US',
                'model' => 'Bookings',
                'foreign_key' => '4',
                'field' => 'description',
                'content' => 'Oil leak',
            ],
            [
                'id' => '23',
                'locale' => 'ru',
                'model' => 'Bookings',
                'foreign_key' => '4',
                'field' => 'description',
                'content' => 'Утечка масла.',
            ],
            [
                'id' => '24',
                'locale' => 'en_US',
                'model' => 'Bookings',
                'foreign_key' => '5',
                'field' => 'description',
                'content' => 'Tires change.',
            ],
            [
                'id' => '25',
                'locale' => 'ru',
                'model' => 'Bookings',
                'foreign_key' => '5',
                'field' => 'description',
                'content' => 'Замена колес.',
            ],
        ];

        $table = $this->table('i18n');
        $table->insert($data)->save();
    }
}
