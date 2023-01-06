<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "view_stat".
 *
 * @property string|null $c_code
 * @property string|null $c_code_1
 * @property string|null $c_code_2
 * @property string|null $c_code_3
 * @property string|null $c_code_4
 * @property string|null $c_name
 * @property int|null $c_type_id
 * @property int|null $c_param_id
 * @property int|null $c_params
 * @property string|null $c_param_1
 * @property string|null $c_param_2
 * @property string|null $c_param_3
 * @property string|null $c_param_4
 * @property string|null $c_param_5
 * @property string|null $c_table_name
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
 */
class ViewStat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_stat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_type_id', 'c_param_id', 'c_params', 'soato_id', 'status'], 'integer'],
            [['soato_id'], 'required'],
            [['created', 'updated'], 'safe'],
            [['c_code', 'c_code_1', 'c_code_2', 'c_code_3', 'c_code_4', 'c_param_1', 'c_param_2', 'c_param_3', 'c_param_4', 'c_param_5', 'c_table_name', 'code', 'value', 'value_1', 'value_2', 'value_3', 'value_4', 'value_5'], 'string', 'max' => 255],
            [['c_name'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'c_code' => 'C Code',
            'c_code_1' => 'C Code 1',
            'c_code_2' => 'C Code 2',
            'c_code_3' => 'C Code 3',
            'c_code_4' => 'C Code 4',
            'c_name' => 'C Name',
            'c_type_id' => 'C Type ID',
            'c_param_id' => 'C Param ID',
            'c_params' => 'C Params',
            'c_param_1' => 'C Param 1',
            'c_param_2' => 'C Param 2',
            'c_param_3' => 'C Param 3',
            'c_param_4' => 'C Param 4',
            'c_param_5' => 'C Param 5',
            'c_table_name' => 'C Table Name',
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
}
