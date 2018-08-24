<?php
namespace sorokinmedia\salary\handlers\SalaryType;

use sorokinmedia\salary\entities\SalaryType\AbstractSalaryType;
use sorokinmedia\salary\handlers\SalaryType\interfaces\Create;
use sorokinmedia\salary\handlers\SalaryType\interfaces\Delete;
use sorokinmedia\salary\handlers\SalaryType\interfaces\Update;

/**
 * Class SalaryTypeHandler
 * @package sorokinmedia\salary\handlers\SalaryType
 *
 * @property AbstractSalaryType $salary_type
 */
class SalaryTypeHandler implements Create, Update, Delete
{
    public $salary_type;

    /**
     * SalaryTypeHandler constructor.
     * @param AbstractSalaryType $salaryRate
     */
    public function __construct(AbstractSalaryType $salaryType)
    {
        $this->salary_type = $salaryType;
        return $this;
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     */
    public function create() : bool
    {
        return (new actions\Create($this->salary_type))->execute();
    }

    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function update() : bool
    {
        return (new actions\Update($this->salary_type))->execute();
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function delete() : bool
    {
        return (new actions\Delete($this->salary_type))->execute();
    }
}