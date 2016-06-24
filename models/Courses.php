<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $levelId
 *
 * @property Classes[] $classes
 * @property Levels $level
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'levelId'], 'required'],
            [['levelId'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 255]
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
            'description' => 'Description',
            'levelId' => 'Level ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasses()
    {
        return $this->hasMany(Classes::className(), ['courseId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Levels::className(), ['id' => 'levelId']);
    }

    public function getFullDetails() {
        return $this->name . " - " . $this->description;
    }
}
