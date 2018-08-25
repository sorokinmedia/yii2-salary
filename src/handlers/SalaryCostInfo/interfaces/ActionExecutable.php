<?php
namespace sorokinmedia\salary\handlers\SalaryCostInfo\interfaces;

/**
 * Interface ActionExecutable
 * @package sorokinmedia\salary\handlers\SalaryCostInfo\interfaces
 */
interface ActionExecutable
{
    /**
     * @return bool
     */
    public function execute() : bool;
}