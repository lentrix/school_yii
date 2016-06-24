<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sections".
 *
 * @property integer $id
 * @property integer $name
 * @property integer $adviser
 * @property integer $levelId
 *
 * @property Enrol[] $enrols
 * @property Teachers $adviser0
 * @property Levels $level
 */
class Sections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'adviser', 'levelId'], 'required'],
            [['adviser', 'levelId'], 'integer'],
            [['name'], 'string', 'max'=>45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'adviser' => 'Adviser',
            'levelId' => 'Level ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrols()
    {
        return $this->hasMany(Enrol::className(), ['sectionId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdviser0()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'adviser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Levels::className(), ['id' => 'levelId']);
    }
}
