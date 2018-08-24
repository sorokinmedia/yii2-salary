<?php
namespace sorokinmedia\salary\handlers\SalaryProject\actions;

/**
 * Class Create
 * @package sorokinmedia\salary\handlers\SalaryProject\actions
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
        $this->salary_project->insertModel();
        return true;
    }
}