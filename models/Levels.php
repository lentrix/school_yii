<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "levels".
 *
 * @property integer $id
 * @property string $shortName
 * @property string $longName
 * @property integer $divisionId
 *
 * @property Enrol[] $enrols
 * @property Divisions $division
 * @property Sections[] $sections
 */
class Levels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'levels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shortName', 'longName', 'divisionId'], 'required'],
            [['divisionId'], 'integer'],
            [['shortName'], 'string', 'max' => 25],
            [['longName'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortName' => 'Short Name',
            'longName' => 'Long Name',
            'divisionId' => 'Division ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrols()
    {
        return $this->hasMany(Enrol::className(), ['levelId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivision()
    {
        return $this->hasOne(Divisions::className(), ['id' => 'divisionId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Sections::className(), ['levelId' => 'id']);
    }
}
