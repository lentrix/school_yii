<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property integer $id
 * @property string $lastName
 * @property string $firstName
 * @property string $salutation
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $phone
 * @property string $specialty
 * @property integer $userId
 *
 * @property Classes[] $classes
 * @property Enrol[] $enrols
 * @property Sections[] $sections
 * @property User $user
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lastName', 'firstName', 'salutation', 'street', 'city', 'state', 'phone', 'specialty'], 'required'],
            [['userId'], 'integer'],
            [['lastName', 'firstName', 'street', 'city', 'state', 'specialty'], 'string', 'max' => 125],
            [['salutation', 'phone'], 'string', 'max' => 25]
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
            'salutation' => 'Salutation',
            'street' => 'Street',
            'city' => 'City',
            'state' => 'State',
            'phone' => 'Phone',
            'specialty' => 'Specialty',
            'userId' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasses()
    {
        return $this->hasMany(Classes::className(), ['teacherId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrols()
    {
        return $this->hasMany(Enrol::className(), ['adviser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Sections::className(), ['adviser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    public function getFullName() {
        return $this->lastName . ', ' . $this->firstName;
    }
}
