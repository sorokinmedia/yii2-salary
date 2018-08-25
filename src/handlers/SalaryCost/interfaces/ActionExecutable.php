<?php
namespace sorokinmedia\salary\handlers\SalaryCost\interfaces;

/**
 * Interface ActionExecutable
 * @package sorokinmedia\salary\handlers\SalaryCost\interfaces
 */
interface ActionExecutable
{
    /**
     * @return bool
     */
    public function execute() : bool;
}