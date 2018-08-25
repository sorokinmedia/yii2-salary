<?php
namespace sorokinmedia\salary\handlers\SalaryCost\actions;

use sorokinmedia\salary\entities\SalaryCost\AbstractSalaryCost;
use sorokinmedia\salary\handlers\SalaryCost\interfaces\ActionExecutable;

/**
 * Class AbstractAction
 * @package sorokinmedia\salary\handlers\SalaryCost\actions
 *
 * @property AbstractSalaryCost $salary_cost
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $salary_cost;

    /**
     * AbstractAction constructor.
     * @param AbstractSalaryCost $salaryCost
     */
    public function __construct(AbstractSalaryCost $salaryCost)
    {
        $this->salary_cost = $salaryCost;
        return $this;
    }
}