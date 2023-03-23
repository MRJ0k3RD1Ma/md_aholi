<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offer".
 *
 * @property int $id
 * @property string $code
 * @property int|null $status
 * @property string|null $min
 * @property string|null $max
 * @property string|null $name
 *
 * @property Codes $code0
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'min', 'max'], 'required'],
            [['id', 'status'], 'integer'],
            [['name'], 'string'],
            [['code', 'min', 'max'], 'string', 'max' => 255],
            [['id', 'code'], 'unique', 'targetAttribute' => ['id', 'code']],
            [['code'], 'exist', 'skipOnError' => true, 'targetClass' => Codes::class, 'targetAttribute' => ['code' => 'code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Kod',
            'status' => 'Status',
            'min' => 'Min',
            'max' => 'Max',
            'name' => 'Taklif',
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
}
