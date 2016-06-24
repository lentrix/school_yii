<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classesEnrolled".
 *
 * @property integer $id
 * @property integer $enrolId
 * @property integer $classId
 * @property string $rating1
 * @property string $rating2
 * @property string $rating3
 * @property string $rating4
 * @property string $remarks
 *
 * @property Enrol $enrol
 * @property Classes $class
 */
class ClassesEnrolled extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classesEnrolled';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enrolId', 'classId'], 'required'],
            [['enrolId', 'classId'], 'integer'],
            [['withdrawn'], 'integer'],
            [['rating1', 'rating2', 'rating3', 'rating4'], 'string', 'max' => 5],
            [['remarks'], 'string', 'max' => 45],
            [['enrolId', 'classId'], 'unique', 'targetAttribute' => ['enrolId', 'classId'], 'message' => 'The combination of Enrol ID and Class ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enrolId' => 'Enrol ID',
            'classId' => 'Class ID',
            'rating1' => 'Rating1',
            'rating2' => 'Rating2',
            'rating3' => 'Rating3',
            'rating4' => 'Rating4',
            'remarks' => 'Remarks',
            'withdrawn' => 'Withdrawn',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrol()
    {
        return $this->hasOne(Enrol::className(), ['id' => 'enrolId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classes::className(), ['id' => 'classId']);
    }
}
