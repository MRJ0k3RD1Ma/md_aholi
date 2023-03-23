<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "codes".
 *
 * @property string $code
 * @property string|null $code_1
 * @property string|null $code_2
 * @property string|null $code_3
 * @property string $name
 * @property int $type_id
 * @property int $param_id
 * @property int|null $params
 * @property string|null $param_1
 * @property string|null $param_2
 * @property string|null $param_3
 * @property string|null $param_4
 * @property string|null $param_5
 * @property string|null $table_name
 *
 * @property Param $param
 * @property CodeType $type
 */
class Codes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'codes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'type_id', 'param_id'], 'required'],
            [['type_id', 'param_id', 'params'], 'integer'],
            [['code', 'code_1', 'code_2', 'code_3', 'param_1', 'param_2', 'param_3', 'param_4', 'param_5', 'table_name','formula'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 500],
            [['code'], 'unique'],
            [['param_id'], 'exist', 'skipOnError' => true, 'targetClass' => Param::class, 'targetAttribute' => ['param_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CodeType::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Kod',
            'code_1' => 'Kod 1',
            'code_2' => 'Kod 2',
            'code_3' => 'Kod 3',
            'name' => 'Parametr nomi',
            'type_id' => 'Turi',
            'param_id' => 'Qiymat kiritish shakli',
            'params' => 'Maydonlar soni',
            'param_1' => 'Maydon 1',
            'param_2' => 'Maydon 2',
            'param_3' => 'Maydon 3',
            'param_4' => 'Maydon 4',
            'param_5' => 'Maydon 5',
            'table_name' => 'Tablitsa nomi',
        ];
    }

    /**
     * Gets query for [[Param]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(Param::class, ['id' => 'param_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(CodeType::class, ['id' => 'type_id']);
    }

    public function getOffer()
    {
        return $this->hasMany(Offer::class, ['code' => 'code']);
    }
}
