<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $role_id
 * @property int|null $company_id
 * @property string $name
 * @property string|null $image
 * @property string $username
 * @property string $password
 * @property string $phone
 * @property string|null $address
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $status
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id'], 'required'],
            [['role_id', 'company_id', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name', 'image', 'username', 'phone', 'address'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'company_id' => 'Company ID',
            'name' => 'Name',
            'image' => 'Image',
            'username' => 'Username',
            'password' => 'Password',
            'phone' => 'Phone',
            'address' => 'Address',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
        ];
    }
}
