<?php
namespace sorokinmedia\salary\entities\SalaryType;

use sorokinmedia\ar_relations\RelationInterface;
use sorokinmedia\salary\forms\SalaryTypeForm;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "salary_type".
 *
 * @property int $id
 * @property string $name
 * @property string $role
 * @property boolean $is_training
 *
 * @property SalaryTypeForm $form
 */
abstract class AbstractSalaryType extends ActiveRecord implements SalaryTypeInterface, RelationInterface
{
    public $form;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary_type';
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
            'id' => \Yii::t('app', 'ID'),
            'name' => \Yii::t('app', 'Название'),
            'role' => \Yii::t('app', 'Роль'),
            'is_training' => \Yii::t('app', 'Обучение'),
        ];
    }

    /**
     * AbstractSalaryType constructor.
     * @param array $config
     * @param SalaryTypeForm|null $form
     */
    public function __construct(array $config = [], SalaryTypeForm $form = null)
    {
        if (!is_null($form)){
            $this->form = $form;
        }
        parent::__construct($config);
    }

    /**
     * получение данных из формы
     */
    public function getFromForm()
    {
        if (!is_null($this->form)){
            $this->name = $this->form->name;
            $this->role = $this->form->role;
            $this->is_training = $this->form->is_training;
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
}
