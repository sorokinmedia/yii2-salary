<?php
namespace sorokinmedia\salary\entities\SalaryProject;

/**
 * Interface SalaryProjectInterface
 * @package sorokinmedia\salary\entities\SalaryProject
 */
interface SalaryProjectInterface
{
    /**
     * получить родительский проект
     * @return mixed
     */
    public function getParent();

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