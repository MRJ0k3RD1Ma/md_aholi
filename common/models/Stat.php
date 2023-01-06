<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stat".
 *
 * @property int $soato_id
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $status
 * @property string $code
 * @property string|null $value
 * @property string|null $value_1
 * @property string|null $value_2
 * @property string|null $value_3
 * @property string|null $value_4
 * @property string|null $value_5
 *
 * @property Codes $code0
 * @property Soato $soato
 */
class Stat extends \yii\db\ActiveRecord
{
    public $str,$file,$num,$date;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['soato_id', 'code'], 'required'],
            [['soato_id', 'status','num'], 'integer'],
            [['created', 'updated','date'], 'safe'],
            [['code', 'value', 'value_1', 'value_2', 'value_3', 'value_4', 'value_5','str','file'], 'string', 'max' => 255],
            [['soato_id', 'code'], 'unique', 'targetAttribute' => ['soato_id', 'code']],
            [['code'], 'exist', 'skipOnError' => true, 'targetClass' => Codes::class, 'targetAttribute' => ['code' => 'code']],
            [['soato_id'], 'exist', 'skipOnError' => true, 'targetClass' => Soato::class, 'targetAttribute' => ['soato_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'soato_id' => 'Soato ID',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
            'code' => 'Code',
            'value' => 'Value',
            'value_1' => 'Value 1',
            'value_2' => 'Value 2',
            'value_3' => 'Value 3',
            'value_4' => 'Value 4',
            'value_5' => 'Value 5',
        ];
    }

    /**
     * Gets query for [[Code0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCode0()
    {
        return $this->hasOne(Codes::class, ['code' => 'code']);
    }

    /**
     * Gets query for [[Soato]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSoato()
    {
        return $this->hasOne(Soato::class, ['id' => 'soato_id']);
    }
}
