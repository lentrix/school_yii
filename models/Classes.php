<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property integer $id
 * @property integer $courseId
 * @property integer $teacherId
 * @property string $payUnits
 * @property string $creditUnits
 * @property integer $periodId
 * @property integer $max
 * @property integer $userId
 * @property integer $blocked
 *
 * @property Periods $period
 * @property Courses $course
 * @property Teachers $teacher
 * @property Colleges $college
 * @property ClassesEnrolled[] $classesEnrolleds
 */
class Classes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courseId', 'teacherId', 'payUnits', 'userId', 'creditUnits', 'periodId', 'max'], 'required'],
            [['courseId', 'teacherId', 'periodId', 'userId', 'blocked', 'max'], 'integer'],
            [['payUnits', 'creditUnits'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'courseId' => 'Course',
            'teacherId' => 'Teacher',
            'payUnits' => 'Pay Units',
            'creditUnits' => 'Credit Units',
            'periodId' => 'Period',
            'userId' => 'User',
            'blocked' => 'Blocked',
            'max' => 'Max'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedules::className(), ['classId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriod()
    {
        return $this->hasOne(Periods::className(), ['id' => 'periodId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'courseId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'teacherId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassesEnrolleds()
    {
        return $this->hasMany(ClassesEnrolled::className(), ['classId' => 'id']);
    }

    public function getActiveClassesEnrolleds() 
    {
        return ClassesEnrolled::find()
                ->andFilterWhere(['classId'=>$this->id])
                ->andFilterWhere(['withdrawn'=>0])->all();
    }
    
    public function getScheduleString() {
        $str = '';
        foreach($this->schedules as $s) {
            $str.= '<span>' . date('h:i', strtotime($s->start)) 
                . '-' . date('h:i', strtotime($s->end)) 
                . ' ' . $s->days . ' ' . $s->venue->name . ' </span>';
        }
        return $str;
    }

    public function getDensity() {
        return count($this->classesEnrolleds);
    }
}
