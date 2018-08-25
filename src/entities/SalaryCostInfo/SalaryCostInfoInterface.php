<?php
namespace sorokinmedia\salary\entities\SalaryCostInfo;

/**
 * Interface SalaryCostInfoInterface
 * @package sorokinmedia\salary\entities\SalaryCostInfo
 */
interface SalaryCostInfoInterface
{
    /**
     * получить расход
     * @return mixed
     */
    public function getCost();

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