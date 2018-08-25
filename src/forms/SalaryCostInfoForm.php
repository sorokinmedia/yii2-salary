<?php
namespace sorokinmedia\salary\forms;

use sorokinmedia\salary\entities\SalaryCostInfo\AbstractSalaryCostInfo;
use yii\base\Model;

/**
 * Class SalaryCostInfoForm
 * @package sorokinmedia\salary\forms
 *
 * @property int $rate
 * @property float $hours
 */
class SalaryCostInfoForm extends Model
{
    public $rate;
    public $hours;

    /**
     * SalaryCostInfoForm constructor.
     * @param array $config
     * @param AbstractSalaryCostInfo|null $salaryCostInfo
     */
    public function __construct(array $config = [],  AbstractSalaryCostInfo $salaryCostInfo = null)
    {
        if (!is_null($salaryCostInfo)){
            $this->rate = $salaryCostInfo->rate;
            $this->hours = $salaryCostInfo->hours;
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rate', 'hours'], 'required'],
            [['rate'], 'integer'],
            [['hours'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rate' => \Yii::t('app', 'Часовая ставка'),
            'hours' => \Yii::t('app', 'Количество часов'),
        ];
    }
}