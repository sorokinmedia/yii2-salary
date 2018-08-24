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
 */
class SalaryTypeForm extends Model
{
    public $name;
    public $role;

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
        ];
    }
}