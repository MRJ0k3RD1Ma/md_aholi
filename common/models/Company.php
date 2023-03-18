<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $inn
 * @property string $director
 * @property string $phone
 * @property int $type_id
 * @property int $soato_id
 * @property string $address
 * @property int|null $parent_id
 * @property int|null $paid
 * @property string|null $paid_date
 * @property string|null $active_to
 * @property string|null $active_each
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $status
 *
 * @property CompanyType $type
 * @property User[] $users
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'soato_id'], 'required'],
            [['type_id', 'soato_id', 'parent_id', 'paid', 'status'], 'integer'],
            [['paid_date', 'active_to', 'active_each', 'created', 'updated'], 'safe'],
            [['name', 'inn', 'director', 'phone', 'address'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyType::class, 'targetAttribute' => ['type_id' => 'id']],
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
            'inn' => 'Inn',
            'director' => 'Director',
            'phone' => 'Phone',
            'type_id' => 'Type ID',
            'soato_id' => 'Soato ID',
            'address' => 'Address',
            'parent_id' => 'Parent ID',
            'paid' => 'Paid',
            'paid_date' => 'Paid Date',
            'active_to' => 'Active To',
            'active_each' => 'Active Each',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(CompanyType::class, ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['company_id' => 'id']);
    }
}
