<?php
namespace sorokinmedia\salary\handlers\SalaryProject;

use sorokinmedia\salary\entities\SalaryProject\AbstractSalaryProject;
use sorokinmedia\salary\handlers\SalaryProject\interfaces\Create;
use sorokinmedia\salary\handlers\SalaryProject\interfaces\Delete;
use sorokinmedia\salary\handlers\SalaryProject\interfaces\Update;

/**
 * Class SalaryProjectHandler
 * @package sorokinmedia\salary\handlers\SalaryProject
 *
 * @property AbstractSalaryProject $salary_project
 */
class SalaryProjectHandler implements Create, Update, Delete
{
    public $salary_project;

    /**
     * SalaryProjectHandler constructor.
     * @param AbstractSalaryProject $salaryProject
     */
    public function __construct(AbstractSalaryProject $salaryProject)
    {
        $this->salary_project = $salaryProject;
        return $this;
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     */
    public function create() : bool
    {
        return (new actions\Create($this->salary_project))->execute();
    }

    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function update() : bool
    {
        return (new actions\Update($this->salary_project))->execute();
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function delete() : bool
    {
        return (new actions\Delete($this->salary_project))->execute();
    }
}