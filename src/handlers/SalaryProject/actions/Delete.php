<?php
namespace sorokinmedia\salary\handlers\SalaryProject\actions;

/**
 * Class Delete
 * @package sorokinmedia\salary\handlers\SalaryProject\actions
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
        $this->salary_project->deleteModel();
        return true;
    }
}