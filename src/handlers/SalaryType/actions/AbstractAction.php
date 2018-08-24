<?php
namespace sorokinmedia\salary\handlers\SalaryType\actions;

use sorokinmedia\salary\entities\SalaryType\AbstractSalaryType;
use sorokinmedia\salary\handlers\SalaryType\interfaces\ActionExecutable;

/**
 * Class AbstractAction
 * @package sorokinmedia\salary\handlers\SalaryType\actions
 *
 * @property AbstractSalaryType $salary_type
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $salary_type;

    /**
     * AbstractAction constructor.
     * @param AbstractSalaryType $salaryType
     */
    public function __construct(AbstractSalaryType $salaryType)
    {
        $this->salary_type = $salaryType;
        return $this;
    }
}