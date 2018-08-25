<?php
namespace sorokinmedia\salary\handlers\SalaryCost\actions;

/**
 * Class Update
 * @package sorokinmedia\salary\handlers\SalaryCost\actions
 */
class Update extends AbstractAction
{
    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function execute() : bool
    {
        $this->salary_cost->updateModel();
        return true;
    }
}