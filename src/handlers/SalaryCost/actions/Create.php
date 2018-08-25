<?php
namespace sorokinmedia\salary\handlers\SalaryCost\actions;

/**
 * Class Create
 * @package sorokinmedia\salary\handlers\SalaryCost\actions
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
        $this->salary_cost->insertModel();
        return true;
    }
}