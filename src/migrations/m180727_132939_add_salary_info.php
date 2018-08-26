<?php
use yii\db\Migration;

/**
 * Class m180727_132939_add_salary_info
 * use migration as sudo php yii migrate --migrationPath=@sorokinmedia/salary/migrations/
 */
class m180727_132939_add_salary_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('salary_cost_info', [
            'cost_id' => $this->integer(),
            'rate' => $this->integer(),
            'hours' => $this->float(2),
        ]);
        $this->addPrimaryKey('pk-salary_cost_info-cost_id', 'salary_cost_info', ['cost_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('salary_info');
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
