<?php
namespace sorokinmedia\salary\handlers\SalaryProject\actions;

/**
 * Class Update
 * @package sorokinmedia\salary\handlers\SalaryProject\actions
 */
class Update extends AbstractAction
{
    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function execute() : bool
    {
        $this->salary_project->updateModel();
        return true;
    }
}