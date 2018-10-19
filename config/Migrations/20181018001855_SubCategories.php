<?php
use Migrations\AbstractMigration;

class SubCategories extends AbstractMigration
{
    public function up()
    {

        $this->table('categories')
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

        $this->table('subcategories')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('category_id', 'integer', [
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
        $this->dropTable('categories');
        $this->dropTable('subcategories');
    }
}
