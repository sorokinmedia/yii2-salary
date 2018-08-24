<?php
namespace sorokinmedia\salary\entities\SalaryProject;

use sorokinmedia\ar_relations\RelationInterface;
use sorokinmedia\salary\forms\SalaryProjectForm;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "salary_project".
 *
 * @property int $id
 * @property string $name
 * @property string $role
 * @property int $parent_id
 *
 * @property SalaryProjectForm $form
 */
abstract class AbstractSalaryProject extends ActiveRecord implements SalaryProjectInterface, RelationInterface
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
            'id' => \Yii::t('app', 'ID'),
            'name' => \Yii::t('app', 'Название'),
            'role' => \Yii::t('app', 'Роль'),
            'parent_id' => \Yii::t('app', 'Родитель'),
        ];
    }

    /**
     * AbstractSalaryProject constructor.
     * @param array $config
     * @param SalaryProjectForm|null $form
     */
    public function __construct(array $config = [], SalaryProjectForm $form = null)
    {
        if (!is_null($form)){
            $this->form = $form;
        }
        parent::__construct($config);
    }

    /**
     * получить родителя
     * @return mixed|null|AbstractSalaryProject
     */
    public function getParent()
    {
        return static::findOne($this->parent_id);
    }

    /**
     * получение данных из формы
     */
    public function getFromForm()
    {
        if (!is_null($this->form)){
            $this->name = $this->form->name;
            $this->role = $this->form->role;
            $this->parent_id = $this->form->parent_id;
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
