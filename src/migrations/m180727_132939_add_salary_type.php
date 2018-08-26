<?php
use yii\db\Migration;

/**
 * Class m180727_132939_add_salary_type
 * use migration as sudo php yii migrate --migrationPath=@sorokinmedia/salary/migrations/
 */
class m180727_132939_add_salary_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('salary_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'role' => $this->string(255),
            'is_training' => $this->boolean()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('salary_type');
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
