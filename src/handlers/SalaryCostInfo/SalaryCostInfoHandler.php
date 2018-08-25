<?php
namespace sorokinmedia\salary\handlers\SalaryCostInfo;

use sorokinmedia\salary\entities\SalaryCostInfo\AbstractSalaryCostInfo;
use sorokinmedia\salary\handlers\SalaryCostInfo\interfaces\Create;
use sorokinmedia\salary\handlers\SalaryCostInfo\interfaces\Delete;
use sorokinmedia\salary\handlers\SalaryCostInfo\interfaces\Update;

/**
 * Class SalaryCostInfoHandler
 * @package sorokinmedia\salary\handlers\SalaryProject
 *
 * @property AbstractSalaryCostInfo $salary_cost_info
 */
class SalaryCostInfoHandler implements Create, Update, Delete
{
    public $salary_cost_info;

    /**
     * SalaryCostInfoHandler constructor.
     * @param AbstractSalaryCostInfo $salaryCostInfo
     */
    public function __construct(AbstractSalaryCostInfo $salaryCostInfo)
    {
        $this->salary_cost_info = $salaryCostInfo;
        return $this;
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     */
    public function create() : bool
    {
        return (new actions\Create($this->salary_cost_info))->execute();
    }

    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function update() : bool
    {
        return (new actions\Update($this->salary_cost_info))->execute();
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function delete() : bool
    {
        return (new actions\Delete($this->salary_cost_info))->execute();
    }
}