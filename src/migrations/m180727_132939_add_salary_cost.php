<?php
use yii\db\Migration;

/**
 * Class m180727_132939_add_salary_cost
 * use migration as sudo php yii migrate --migrationPath=@sorokinmedia/salary/migrations/
 */
class m180727_132939_add_salary_cost extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('salary_cost', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(),
            'type_id' => $this->integer(),
            'user_id' => $this->integer(),
            'name' => $this->string(255),
            'sum' => $this->money(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('salary_cost');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180727_132939_refactor_user cannot be reverted.\n";

        return false;
    }
    */
}
