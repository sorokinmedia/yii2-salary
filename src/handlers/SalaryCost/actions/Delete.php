<?php
namespace sorokinmedia\salary\handlers\SalaryCost\actions;

/**
 * Class Delete
 * @package sorokinmedia\salary\handlers\SalaryCost\actions
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
        $this->salary_cost->deleteModel();
        return true;
    }
}