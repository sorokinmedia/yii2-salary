<?php
namespace sorokinmedia\salary\handlers\SalaryProject\actions;

use sorokinmedia\salary\entities\SalaryProject\AbstractSalaryProject;
use sorokinmedia\salary\handlers\SalaryType\interfaces\ActionExecutable;

/**
 * Class AbstractAction
 * @package sorokinmedia\salary\handlers\SalaryProject\actions
 *
 * @property AbstractSalaryProject $salary_project
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $salary_project;

    /**
     * AbstractAction constructor.
     * @param AbstractSalaryProject $salaryProject
     */
    public function __construct(AbstractSalaryProject $salaryProject)
    {
        $this->salary_project = $salaryProject;
        return $this;
    }
}