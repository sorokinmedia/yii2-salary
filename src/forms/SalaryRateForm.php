<?php
namespace sorokinmedia\salary\forms;

use sorokinmedia\salary\entities\SalaryRate\AbstractSalaryRate;
use yii\base\Model;

/**
 * Class SalaryRateForm
 * @package sorokinmedia\salary\forms
 *
 * @property int $user_id
 * @property int $rate
 * @property int $rate_training
 */
class SalaryRateForm extends Model
{
    public $user_id;
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
            $this->user_id = $salaryRate->user_id;
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
            [['rate', 'user_id'], 'required'],
            [['user_id','rate', 'rate_training'], 'integer'],
            [['rate_training'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => \Yii::t('app', 'Исполнитель'),
            'rate' => \Yii::t('app', 'Часовая ставка'),
            'rate_training' => \Yii::t('app', 'Часовая ставка обучения'),
        ];
    }
}