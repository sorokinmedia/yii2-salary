<?php
namespace sorokinmedia\salary\handlers\SalaryRate\actions;

/**
 * Class Delete
 * @package sorokinmedia\salary\handlers\SalaryRate\actions
 */
class Delete extends AbstractAction
{
    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function execute() : bool
    {
        $this->salary_rate->deleteModel();
        return true;
    }
}