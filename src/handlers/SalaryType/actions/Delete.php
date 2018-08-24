<?php
namespace sorokinmedia\salary\handlers\SalaryType\actions;

/**
 * Class Delete
 * @package sorokinmedia\salary\handlers\SalaryType\actions
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
        $this->salary_type->deleteModel();
        return true;
    }
}