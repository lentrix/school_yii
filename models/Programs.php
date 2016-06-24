<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programs".
 *
 * @property integer $id
 * @property string $shortName
 * @property string $longName
 * @property string $major
 * @property integer $collegeId
 * @property string $track
 *
 * @property Enrol[] $enrols
 * @property Colleges $college
 */
class Programs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'programs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shortName', 'longName', 'major'], 'required'],
            [['collegeId'], 'integer'],
            [['shortName'], 'string', 'max' => 25],
            [['longName', 'major'], 'string', 'max' => 225],
            [['track'], 'string', 'max' => 45]
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
            'major' => 'Major',
            'collegeId' => 'College ID',
            'track' => 'Track',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrols()
    {
        return $this->hasMany(Enrol::className(), ['programId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(Colleges::className(), ['id' => 'collegeId']);
    }

    public function getFullDetails() {
        return $this->shortName . " - " . $this->longName;
    }
}
