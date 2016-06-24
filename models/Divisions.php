<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "divisions".
 *
 * @property integer $id
 * @property string $shortName
 * @property string $longName
 *
 * @property Classes[] $classes
 * @property Levels[] $levels
 */
class Divisions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'divisions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shortName', 'longName'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasses()
    {
        return $this->hasMany(Classes::className(), ['divisionId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevels()
    {
        return $this->hasMany(Levels::className(), ['divisionId' => 'id']);
    }
}
