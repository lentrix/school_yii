<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periods".
 *
 * @property integer $id
 * @property string $shortName
 * @property string $longName
 * @property string $start
 * @property string $end
 * @property integer $type
 * @property integer $active
 *
 * @property Classes[] $classes
 * @property Enrol[] $enrols
 */
class Periods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shortName', 'longName', 'start', 'end', 'type'], 'required'],
            [['start', 'end'], 'safe'],
            [['type', 'active'], 'integer'],
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
            'start' => 'Start',
            'end' => 'End',
            'type' => 'Type',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasses()
    {
        return $this->hasMany(Classes::className(), ['periodId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrols()
    {
        return $this->hasMany(Enrol::className(), ['periodId' => 'id']);
    }

    public function getTypeName() {
        $types = [1=>'Annual', 2=>'Semestral', 3=>'Trimestral'];
        return $types[$this->type];
    }

    public static function getActive() {
        return static::find()->andFilterWhere(['active'=>1])->all();
    }
}
