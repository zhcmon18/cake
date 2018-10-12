<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'email' => 'admin@mail.com',
                'phone' => '450-555-666',
                'password' => '$2y$10$sq8Z/fSFSJhmu8egyBVE0e/gDMYENaN0XArDP4rpYsqoJcQVy72Fq',
                'role' => 'admin',
                'created' => '2018-09-02 19:42:09',
                'modified' => '2018-09-05 23:18:58',
                'activation_key' => '',
                'status' => '1',
            ],
            [
                'id' => '2',
                'email' => 'zaharpl@hotmail.com',
                'phone' => '450-553-6671',
                'password' => '$2y$10$IoVYFEJ2KLnfG8r16dNSveuWXWllqtzIiUaDsvMPvICgQ.dQ.lgli',
                'role' => 'supervisor',
                'created' => '2018-10-11 14:59:20',
                'modified' => '2018-10-11 15:17:40',
                'activation_key' => '',
                'status' => '1',
            ],
            [
                'id' => '3',
                'email' => 'user2@mail.qc.ca',
                'phone' => '450-956-2356',
                'password' => '$2y$10$9XQjWzU8b8s7LuN..x9rt.J6RiEAM4rvVqJXFhkAu5C3RG3j3LkuW',
                'role' => 'supervisor',
                'created' => '2018-10-11 22:30:54',
                'modified' => '2018-10-11 22:30:54',
                'activation_key' => '',
                'status' => '1',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
