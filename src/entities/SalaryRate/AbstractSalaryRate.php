<?php
namespace sorokinmedia\salary\entities\SalaryRate;

use sorokinmedia\ar_relations\RelationInterface;
use sorokinmedia\salary\forms\SalaryRateForm;
use sorokinmedia\user\entities\User\AbstractUser;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "rate_tech".
 *
 * @property integer $user_id
 * @property integer $rate
 * @property integer $rate_training
 *
 * @property AbstractUser $user
 * @property SalaryRateForm $form
 */
abstract class AbstractSalaryRate extends ActiveRecord implements SalaryRateInterface, RelationInterface
{
    public $form;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary_rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'rate', 'rate_training'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AbstractUser::class, 'targetAttribute' => ['user_id' => 'id']],
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

    /**
     * AbstractSalaryRate constructor.
     * @param array $config
     * @param SalaryRateForm|null $form
     */
    public function __construct(array $config = [], SalaryRateForm $form = null)
    {
        if (!is_null($form)){
            $this->form = $form;
        }
        parent::__construct($config);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne($this->__userClass, ['id' => 'user_id']);
    }

    /**
     * получение данных из формы
     */
    public function getFromForm()
    {
        if (!is_null($this->form)){
            $this->user_id = $this->form->user_id;
            $this->rate = $this->form->rate;
            $this->rate_training = $this->form->rate_training;
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
