<?php
use yii\db\Migration;

/**
 * Class m180727_132939_add_salary_rate
 * use migration as sudo php yii migrate --migrationPath=@sorokinmedia/salary/migrations/
 */
class m180727_132939_add_salary_rate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('salary_rate', [
            'user_id' => $this->integer(),
            'rate' => $this->integer(),
            'rate_training' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-salary_rate-user_id', 'salary_rate', ['user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('salary_rate');
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
