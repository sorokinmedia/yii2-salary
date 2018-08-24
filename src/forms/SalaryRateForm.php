<?php
namespace sorokinmedia\salary\forms;

use sorokinmedia\salary\entities\SalaryRate\AbstractSalaryRate;
use yii\base\Model;

/**
 * Class SalaryRateForm
 * @package sorokinmedia\salary\forms
 *
 * @property int $rate
 * @property int $rate_training
 */
class SalaryRateForm extends Model
{
    public $rate;
    public $rate_training;

    /**
     * SalaryRateForm constructor.
     * @param array $config
     * @param AbstractSalaryRate|null $salaryRate
     */
    public function __construct(array $config = [], AbstractSalaryRate $salaryRate = null)
    {
        if (!is_null($salaryRate)){
            $this->rate = $salaryRate->rate;
            $this->rate_training = $salaryRate->rate_training;
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rate'], 'required'],
            [['rate', 'rate_training'], 'integer'],
            [['rate_training'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rate' => \Yii::t('app', 'Часовая ставка'),
            'rate_training' => \Yii::t('app', 'Часовая ставка обучения'),
        ];
    }
}