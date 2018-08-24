<?php
namespace sorokinmedia\salary\entities\SalaryRate;

/**
 * Interface SalaryRateInterface
 * @package sorokinmedia\salary\entities\SalaryRate
 */
interface SalaryRateInterface
{
    /**
     * получение пользователя
     * @return mixed
     */
    public function getUser();

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