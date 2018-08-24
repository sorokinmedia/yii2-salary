<?php
namespace sorokinmedia\salary\handlers\SalaryRate\actions;

/**
 * Class Create
 * @package sorokinmedia\salary\handlers\SalaryRate\actions
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
        $this->salary_rate->insertModel();
        return true;
    }
}