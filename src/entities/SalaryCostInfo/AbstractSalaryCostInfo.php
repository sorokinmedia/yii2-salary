<?php
namespace sorokinmedia\salary\entities\SalaryCostInfo;

use sorokinmedia\ar_relations\RelationInterface;
use sorokinmedia\salary\entities\SalaryCost\AbstractSalaryCost;
use sorokinmedia\salary\forms\SalaryCostInfoForm;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "salary_cost_info".
 *
 * @property integer $cost_id
 * @property integer $rate
 * @property double $hours
 *
 * @property AbstractSalaryCost $cost
 * @property SalaryCostInfoForm $form
 */
abstract class AbstractSalaryCostInfo extends ActiveRecord implements SalaryCostInfoInterface, RelationInterface
{
    public $form;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary_cost_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost_id', 'rate', 'hours'], 'required'],
            [['cost_id', 'rate'], 'integer'],
            [['hours'], 'number'],
            [['cost_id'], 'exist', 'skipOnError' => true, 'targetClass' => AbstractSalaryCost::class, 'targetAttribute' => ['cost_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cost_id' => \Yii::t('app', 'Расход'),
            'rate' => \Yii::t('app', 'Часовая ставка'),
            'hours' => \Yii::t('app', 'Количество часов'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCost()
    {
        return $this->hasOne($this->__salaryCostClass, ['id' => 'cost_id']);
    }

    /**
     * AbstractSalaryCostInfo constructor.
     * @param array $config
     * @param SalaryCostInfoForm|null $form
     */
    public function __construct(array $config = [], SalaryCostInfoForm $form = null)
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
            $this->rate = $this->form->rate;
            $this->hours = $this->form->hours;
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
