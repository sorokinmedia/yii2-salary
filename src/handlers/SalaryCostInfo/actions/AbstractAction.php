<?php
namespace sorokinmedia\salary\handlers\SalaryCostInfo\actions;

use sorokinmedia\salary\entities\SalaryCostInfo\AbstractSalaryCostInfo;
use sorokinmedia\salary\handlers\SalaryCostInfo\interfaces\ActionExecutable;

/**
 * Class AbstractAction
 * @package sorokinmedia\salary\handlers\SalaryCostInfo\actions
 *
 * @property AbstractSalaryCostInfo $salary_cost_info
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $salary_cost_info;

    /**
     * AbstractAction constructor.
     * @param AbstractSalaryCostInfo $salaryCostInfo
     */
    public function __construct(AbstractSalaryCostInfo $salaryCostInfo)
    {
        $this->salary_cost_info = $salaryCostInfo;
        return $this;
    }
}