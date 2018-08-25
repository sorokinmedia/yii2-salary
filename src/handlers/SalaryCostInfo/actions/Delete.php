<?php
namespace sorokinmedia\salary\handlers\SalaryCostInfo\actions;

/**
 * Class Delete
 * @package sorokinmedia\salary\handlers\SalaryCostInfo\actions
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
        $this->salary_cost_info->deleteModel();
        return true;
    }
}