<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $lastName
 * @property string $firstName
 * @property string $middleName
 * @property string $birthDate
 * @property string $gender
 * @property string $status
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $citizen
 * @property string $religion
 * @property string $father
 * @property string $mother
 * @property string $phone
 * @property integer $userId
 *
 * @property Enrol[] $enrols
 * @property User $user
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lastName', 'firstName', 'middleName', 'birthDate', 'gender', 'status', 'street', 'city', 'state', 'citizen', 'religion', 'dateOfEntry'], 'required'],
            [['birthDate','dateOfEntry'], 'safe'],
            [['userId'], 'integer'],
            [['lastName', 'firstName', 'middleName'], 'string', 'max' => 125],
            [['gender'], 'string', 'max' => 6],
            [['status'], 'string', 'max' => 10],
            [['street', 'city', 'state', 'father', 'mother','photo'], 'string', 'max' => 225],
            [['citizen', 'religion'], 'string', 'max' => 45],
            [['phone'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lastName' => 'Last Name',
            'firstName' => 'First Name',
            'middleName' => 'Middle Name',
            'birthDate' => 'Birth Date',
            'gender' => 'Gender',
            'status' => 'Status',
            'street' => 'Street',
            'city' => 'City',
            'state' => 'State',
            'citizen' => 'Citizen',
            'religion' => 'Religion',
            'father' => 'Father',
            'mother' => 'Mother',
            'phone' => 'Phone',
            'photo' => 'Photo',
            'dateOfEntry' => 'Date of Entry',
            'userId' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrols()
    {
        return $this->hasMany(Enrol::className(), ['studentId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    public function getFullName() {
        return $this->lastName . ', ' . $this->firstName . ' ' . $this->middleName;
    }
}
