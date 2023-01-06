<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "view_code2".
 *
 * @property string $code
 * @property string|null $code_1
 * @property string|null $code_2
 * @property string|null $code_3
 * @property string|null $code_4
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
 */
class ViewCode2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_code2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'param_id'], 'required'],
            [['type_id', 'param_id', 'params'], 'integer'],
            [['code', 'code_1', 'code_2', 'code_3', 'code_4', 'param_1', 'param_2', 'param_3', 'param_4', 'param_5', 'table_name'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'code_1' => 'Code 1',
            'code_2' => 'Code 2',
            'code_3' => 'Code 3',
            'code_4' => 'Code 4',
            'name' => 'Name',
            'type_id' => 'Type ID',
            'param_id' => 'Param ID',
            'params' => 'Params',
            'param_1' => 'Param 1',
            'param_2' => 'Param 2',
            'param_3' => 'Param 3',
            'param_4' => 'Param 4',
            'param_5' => 'Param 5',
            'table_name' => 'Table Name',
        ];
    }
}
