<?php
use Migrations\AbstractMigration;

class SubSubscriptions extends AbstractMigration
{
    public function up()
    {

        $this->table('subscriptions')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => true,
            ])
            ->create();

        $this->table('promotions')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('subscription_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('subscriptions');
        $this->dropTable('promotions');
    }
}
