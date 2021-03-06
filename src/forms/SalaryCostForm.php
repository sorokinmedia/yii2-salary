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
 * @property string $jira_id
 * @property float $hours
 * @property string $date
 */
class SalaryCostForm extends Model
{
    public $project_id;
    public $type_id;
    public $user_id;
    public $name;
    public $jira_id;
    public $hours;
    public $date;

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
            $this->jira_id = $salaryCost->jira_id;
            if (!is_null($salaryCost->info)){
                $this->hours = $salaryCost->info->hours;
            }
            $this->date = null;
            if (!is_null($salaryCost->created_at)){
                $this->date = date('d-m-Y', $salaryCost->created_at);
            }
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
            [['hours'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['jira_id'], 'string', 'max' => 50],
            [['date'], 'string'],
            [['project_id', 'type_id', 'user_id', 'hours', 'name', 'date'], 'required']
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
            'name' => \Yii::t('app', 'Описание работы'),
            'jira_id' => \Yii::t('app', 'Номер задачи в JIRA'),
            'hours' => \Yii::t('app', 'Количество часов'),
            'date' => \Yii::t('app', 'Дата выполнения работы')
        ];
    }
}