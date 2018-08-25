<?php
namespace sorokinmedia\salary\handlers\SalaryCostInfo\actions;

/**
 * Class Update
 * @package sorokinmedia\salary\handlers\SalaryCostInfo\actions
 */
class Update extends AbstractAction
{
    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function execute() : bool
    {
        $this->salary_cost_info->updateModel();
        return true;
    }
}