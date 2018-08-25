<?php
namespace sorokinmedia\salary\handlers\SalaryCost;

use sorokinmedia\salary\entities\SalaryCost\AbstractSalaryCost;
use sorokinmedia\salary\handlers\SalaryCost\interfaces\Create;
use sorokinmedia\salary\handlers\SalaryCost\interfaces\Delete;
use sorokinmedia\salary\handlers\SalaryCost\interfaces\Update;

/**
 * Class SalaryCostHandler
 * @package sorokinmedia\salary\handlers\SalaryCost
 *
 * @property AbstractSalaryCost $salary_cost
 */
class SalaryCostHandler implements Create, Update, Delete
{
    public $salary_cost;

    /**
     * SalaryCostInfoHandler constructor.
     * @param AbstractSalaryCost $salaryCost
     */
    public function __construct(AbstractSalaryCost $salaryCost)
    {
        $this->salary_cost = $salaryCost;
        return $this;
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     */
    public function create() : bool
    {
        return (new actions\Create($this->salary_cost))->execute();
    }

    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function update() : bool
    {
        return (new actions\Update($this->salary_cost))->execute();
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function delete() : bool
    {
        return (new actions\Delete($this->salary_cost))->execute();
    }
}