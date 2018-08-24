<?php
namespace sorokinmedia\salary\handlers\SalaryRate;

use sorokinmedia\salary\entities\SalaryRate\AbstractSalaryRate;
use sorokinmedia\salary\handlers\SalaryRate\interfaces\Create;
use sorokinmedia\salary\handlers\SalaryRate\interfaces\Delete;
use sorokinmedia\salary\handlers\SalaryRate\interfaces\Update;

/**
 * Class SalaryRateHandler
 * @package sorokinmedia\salary\handlers\SalaryRate
 *
 * @property AbstractSalaryRate $salary_rate
 */
class SalaryRateHandler implements Create, Update, Delete
{
    public $salary_rate;

    /**
     * SalaryRateHandler constructor.
     * @param AbstractSalaryRate $salaryRate
     */
    public function __construct(AbstractSalaryRate $salaryRate)
    {
        $this->salary_rate = $salaryRate;
        return $this;
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     */
    public function create() : bool
    {
        return (new actions\Create($this->salary_rate))->execute();
    }

    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function update() : bool
    {
        return (new actions\Update($this->salary_rate))->execute();
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function delete() : bool
    {
        return (new actions\Delete($this->salary_rate))->execute();
    }
}