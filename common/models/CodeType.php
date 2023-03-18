<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "code_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Codes[] $codes
 */
class CodeType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'code_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Codes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodes()
    {
        return $this->hasMany(Codes::class, ['type_id' => 'id']);
    }
}
