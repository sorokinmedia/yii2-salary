<?php
namespace sorokinmedia\salary\handlers\SalaryType\interfaces;

/**
 * Interface ActionExecutable
 * @package sorokinmedia\salary\handlers\SalaryType\interfaces
 */
interface ActionExecutable
{
    /**
     * @return bool
     */
    public function execute() : bool;
}