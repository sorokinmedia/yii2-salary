<?php
namespace sorokinmedia\salary\handlers\SalaryType\actions;

/**
 * Class Update
 * @package sorokinmedia\salary\handlers\SalaryType\actions
 */
class Update extends AbstractAction
{
    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function execute() : bool
    {
        $this->salary_type->updateModel();
        return true;
    }
}