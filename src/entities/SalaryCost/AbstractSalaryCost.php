<?php
namespace sorokinmedia\salary\entities\SalaryCost;

use sorokinmedia\ar_relations\RelationInterface;
use sorokinmedia\user\entities\User\AbstractUser;
use sorokinmedia\salary\entities\{
    SalaryCostInfo\AbstractSalaryCostInfo,
    SalaryProject\AbstractSalaryProject,
    SalaryRate\AbstractSalaryRate,
    SalaryType\AbstractSalaryType
};
use sorokinmedia\salary\forms\SalaryCostForm;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "salary_cost".
 *
 * @property int $id
 * @property int $project_id
 * @property int $type_id
 * @property int $user_id
 * @property string $name
 * @property double $sum
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property SalaryCostForm $form
 *
 * @property AbstractSalaryType $type
 * @property AbstractSalaryRate $rate
 * @property AbstractSalaryProject $project
 * @property AbstractSalaryCostInfo $info
 * @property AbstractUser $user
 */
abstract class AbstractSalaryCost extends ActiveRecord implements SalaryCostInterface, RelationInterface
{
    public $form;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary_cost';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id',  'type_id', 'user_id'], 'integer'],
            [['sum'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => AbstractSalaryProject::class, 'targetAttribute' => ['project_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AbstractSalaryType::class, 'targetAttribute' => ['type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AbstractUser::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => \Yii::t('app', 'Проект'),
            'type_id' => \Yii::t('app', 'Тип работ'),
            'user_id' => \Yii::t('app', 'Исполнитель'),
            'name' => \Yii::t('app', 'Название'),
            'sum' => \Yii::t('app', 'Сумма'),
            'created_at' => \Yii::t('app', 'Добавлено'),
            'updated_at' => \Yii::t('app', 'Обновлено'),
        ];
    }

    /**
     * AbstractSalaryCost constructor.
     * @param array $config
     * @param SalaryCostForm|null $form
     */
    public function __construct(array $config = [], SalaryCostForm $form = null)
    {
        if (!is_null($form)){
            $this->form = $form;
        }
        parent::__construct($config);

    }

    /**
     * перенос данных из формы в модель
     */
    public function getFromForm()
    {
        if (!is_null($this->form)){
            $this->project_id = $this->form->project_id;
            $this->type_id = $this->form->type_id;
            $this->user_id = $this->form->user_id;
            $this->name = $this->form->name;
            $rate = $this->rate->rate;
            if ($this->type->is_training === true) {
                $rate = $this->rate->rate_training;
            }
            $this->sum = $this->form->hours * $rate;
            $this->created_at = strtotime('today noon');
            if ($this->form->created_at) {
                $this->created_at = strtotime($this->form->created_at . ' 12:00:00');
            }
        }
    }

    /**
     * добавление модели в БД
     * @return bool
     * @throws Exception
     * @throws \Throwable
     */
    public function insertModel() : bool
    {
        $this->getFromForm();
        if (!$this->insert()){
            throw new Exception(\Yii::t('app', 'Ошибка добавления в БД'));
        }
        return true;
    }

    /**
     * обновление модели в БД
     * @return bool
     * @throws Exception
     */
    public function updateModel() : bool
    {
        $this->getFromForm();
        if (!$this->save()){
            throw new Exception(\Yii::t('app', 'Ошибка обновления в БД'));
        }
        return true;
    }

    /**
     * даление модели из БД
     * @return bool
     * @throws Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function deleteModel() : bool
    {
        $this->getFromForm();
        if (!$this->delete()){
            throw new Exception(\Yii::t('app', 'Ошибка удаления из БД'));
        }
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne($this->__salaryTypeClass, ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfo()
    {
        return $this->hasOne($this->__salaryInfoClass, ['cost_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRate()
    {
        return $this->hasOne($this->__salaryRateClass, ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne($this->__userClass, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne($this->__salaryProjectClass, ['id' => 'project_id']);
    }
}
