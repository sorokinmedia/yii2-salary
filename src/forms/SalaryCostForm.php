<?php
namespace sorokinmedia\salary\forms;

use sorokinmedia\salary\entities\SalaryCost\AbstractSalaryCost;
use yii\base\Model;

/**
 * Class SalaryCostForm
 * @package sorokinmedia\salary\forms
 *
 * @property int $project_id
 * @property int $type_id
 * @property int $user_id
 * @property string $name
 * @property float $hours
 * @property int $created_at
 */
class SalaryCostForm extends Model
{
    public $project_id;
    public $type_id;
    public $user_id;
    public $name;
    public $hours;
    public $created_at;

    /**
     * SalaryCostInfoForm constructor.
     * @param array $config
     * @param AbstractSalaryCost|null $salaryCost
     */
    public function __construct(array $config = [],  AbstractSalaryCost $salaryCost = null)
    {
        if (!is_null($salaryCost)){
            $this->project_id = $salaryCost->project_id;
            $this->type_id = $salaryCost->type_id;
            $this->user_id = $salaryCost->user_id;
            $this->name = $salaryCost->name;
            $this->hours = $salaryCost->info->hours;
            $this->created_at = $salaryCost->created_at;
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id',  'type_id', 'user_id'], 'integer'],
            [['hours'], 'float'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => \Yii::t('app', 'Проект'),
            'type_id' => \Yii::t('app', 'Тип работ'),
            'user_id' => \Yii::t('app', 'Исполнитель'),
            'name' => \Yii::t('app', 'Название'),
            'hours' => \Yii::t('app', 'Количество часов'),
        ];
    }
}