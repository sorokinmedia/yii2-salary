<?php
namespace sorokinmedia\salary\handlers\SalaryType\interfaces;

/**
 * Interface Update
 * @package sorokinmedia\salary\handlers\SalaryType\interfaces
 */
interface Update
{
    /**
     * @return bool
     */
    public function update() : bool;
}