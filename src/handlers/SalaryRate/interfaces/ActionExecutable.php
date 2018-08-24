<?php
namespace sorokinmedia\salary\handlers\SalaryRate\interfaces;

/**
 * Interface ActionExecutable
 * @package sorokinmedia\salary\handlers\SalaryRate\interfaces
 */
interface ActionExecutable
{
    /**
     * @return bool
     */
    public function execute() : bool;
}