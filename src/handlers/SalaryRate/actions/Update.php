<?php
namespace sorokinmedia\salary\handlers\SalaryRate\actions;

/**
 * Class Update
 * @package sorokinmedia\salary\handlers\SalaryRate\actions
 */
class Update extends AbstractAction
{
    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function execute() : bool
    {
        $this->salary_rate->updateModel();
        return true;
    }
}