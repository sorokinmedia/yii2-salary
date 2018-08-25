<?php
namespace sorokinmedia\salary\handlers\SalaryCostInfo\actions;

/**
 * Class Create
 * @package sorokinmedia\salary\handlers\SalaryCostInfo\actions
 */
class Create extends AbstractAction
{
    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     */
    public function execute() : bool
    {
        $this->salary_cost_info->insertModel();
        return true;
    }
}