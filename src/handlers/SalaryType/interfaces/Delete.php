<?php
namespace sorokinmedia\salary\handlers\SalaryType\interfaces;

/**
 * Interface Delete
 * @package sorokinmedia\salary\handlers\SalaryType\interfaces
 */
interface Delete
{
    /**
     * @return bool
     */
    public function delete() : bool;
}