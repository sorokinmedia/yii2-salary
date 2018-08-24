<?php
namespace sorokinmedia\salary\handlers\SalaryType\actions;

/**
 * Class Create
 * @package sorokinmedia\salary\handlers\SalaryType\actions
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
        $this->salary_type->insertModel();
        return true;
    }
}