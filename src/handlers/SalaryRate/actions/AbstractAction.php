<?php
namespace sorokinmedia\salary\handlers\SalaryRate\actions;

use sorokinmedia\salary\handlers\SalaryRate\interfaces\ActionExecutable;
use sorokinmedia\salary\entities\SalaryRate\AbstractSalaryRate;

/**
 * Class AbstractAction
 * @package sorokinmedia\salary\handlers\SalaryRate\actions
 *
 * @property AbstractSalaryRate $salary_rate
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $salary_rate;

    /**
     * AbstractAction constructor.
     * @param AbstractSalaryRate $salaryRate
     */
    public function __construct(AbstractSalaryRate $salaryRate)
    {
        $this->salary_rate = $salaryRate;
        return $this;
    }
}