<?php
namespace sorokinmedia\salary\entities\SalaryCost;

/**
 * Interface SalaryCostInterface
 * @package sorokinmedia\user\entities\SalaryCost
 */
interface SalaryCostInterface
{
    /**
     * перенос данных из формы в модель
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

    /**
     * получить тип расхода
     * @return mixed
     */
    public function getType();

    /**
     * получить проект
     * @return mixed
     */
    public function getProject();

    /**
     * получить исполнителя
     * @return mixed
     */
    public function getUser();

    /**
     * получить ставки исполнителя
     * @return mixed
     */
    public function getRate();

    /**
     * получить инфо по расходу
     * @return mixed
     */
    public function getInfo();
}