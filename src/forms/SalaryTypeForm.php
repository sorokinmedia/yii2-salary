<?php
namespace sorokinmedia\salary\forms;

use sorokinmedia\salary\entities\SalaryType\AbstractSalaryType;
use yii\base\Model;

/**
 * Class SalaryTypeForm
 * @package sorokinmedia\salary\forms
 *
 * @property string $name
 * @property string $role
 * @property boolean $is_training
 */
class SalaryTypeForm extends Model
{
    public $name;
    public $role;
    public $is_training;

    /**
     * SalaryTypeRole constructor.
     * @param array $config
     * @param AbstractSalaryType|null $salaryType
     */
    public function __construct(array $config = [], AbstractSalaryType $salaryType = null)
    {
        if (!is_null($salaryType)){
            $this->name = $salaryType->name;
            $this->role = $salaryType->role;
            $this->is_training = $salaryType->is_training;
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'role'], 'required'],
            [['name', 'role'], 'string', 'max' => 255],
            [['is_training'], 'boolean'],
            [['is_training'], 'default', 'value' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => \Yii::t('app', 'Название'),
            'role' => \Yii::t('app', 'Роль'),
            'is_training' => \Yii::t('app', 'Обучение'),
        ];
    }
}