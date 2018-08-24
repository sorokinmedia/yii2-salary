<?php
namespace sorokinmedia\salary\entities\SalaryType;

/**
 * Interface SalaryTypeInterface
 * @package sorokinmedia\salary\entities\SalaryType
 */
interface SalaryTypeInterface
{
    /**
     * получение данных из формы
     * @return mixed
     */
    public function getFromForm();

    /**
     * добавление модели в БД
     * @return bool
     */
    public function insertModel() : bool;

    /**
     * обновление модели в БД
     * @return bool
     */
    public function updateModel() : bool;

    /**
     * удаление модели из БД
     * @return bool
     */
    public function deleteModel() : bool;
}