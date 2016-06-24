<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venues".
 *
 * @property integer $id
 * @property string $name
 * @property integer $capacity
 *
 * @property Schedules[] $schedules
 */
class Venues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venues';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'capacity'], 'required'],
            [['capacity'], 'integer'],
            [['name'], 'string', 'max' => 45]
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
            'capacity' => 'Capacity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedules::className(), ['venueId' => 'id']);
    }
}
