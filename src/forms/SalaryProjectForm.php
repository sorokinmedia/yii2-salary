<?php
namespace sorokinmedia\salary\forms;

use sorokinmedia\salary\entities\SalaryProject\AbstractSalaryProject;
use yii\base\Model;

/**
 * Class SalaryProjectForm
 * @package sorokinmedia\salary\forms
 *
 * @property string $name
 * @property string $role
 * @property int $parent_id
 */
class SalaryProjectForm extends Model
{
    public $name;
    public $role;
    public $parent_id;

    /**
     * SalaryProjectForm constructor.
     * @param array $config
     * @param AbstractSalaryProject|null $salaryProject
     */
    public function __construct(array $config = [], AbstractSalaryProject $salaryProject = null)
    {
        if (!is_null($salaryProject)){
            $this->name = $salaryProject->name;
            $this->role = $salaryProject->role;
            $this->parent_id = $salaryProject->parent_id;
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
            [['parent_id'], 'integer'],
            [['parent_id'], 'default', 'value' => 0]
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
            'parent_id' => \Yii::t('app', 'Родитель'),
        ];
    }
}