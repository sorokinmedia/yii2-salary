<?php
namespace sorokinmedia\salary\handlers\SalaryProject\interfaces;

/**
 * Interface ActionExecutable
 * @package sorokinmedia\salary\handlers\SalaryProject\interfaces
 */
interface ActionExecutable
{
    /**
     * @return bool
     */
    public function execute() : bool;
}