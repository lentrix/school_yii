<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enrol".
 *
 * @property integer $id
 * @property integer $studentId
 * @property string $date
 * @property integer $periodId
 * @property integer $levelId
 * @property integer $programId
 * @property integer $status
 * @property integer $sectionId
 * @property integer $adviser
 *
 * @property ClassesEnrolled[] $classesEnrolleds
 * @property Students $student
 * @property Programs $program
 * @property Levels $level
 * @property Periods $period
 * @property Sections $section
 * @property Teachers $adviser0
 */
class Enrol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const STATUS_REGULAR    = 1;
    const STATUS_FRESHMEN   = 2;
    const STATUS_TRANSFEREE = 3;
    const STATUS_WITHDRAWN = 4;

    public static function tableName()
    {
        return 'enrol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['studentId', 'date', 'periodId', 'levelId'], 'required'],
            [['studentId', 'periodId', 'levelId', 'programId', 'status', 'sectionId', 'adviser','blockId'], 'integer'],
            [['date'], 'safe'],
            [['studentId', 'periodId'], 'unique', 'targetAttribute' => ['studentId', 'periodId'], 'message' => 'The combination of Student ID and Period ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'studentId' => 'Student ID',
            'date' => 'Date',
            'periodId' => 'Period ID',
            'levelId' => 'Level',
            'programId' => 'Program',
            'status' => 'Status',
            'sectionId' => 'Section',
            'adviser' => 'Adviser',
            'blockId' => 'Block',
        ];
    }

    public function getBlock() {
        return $this->hasOne(Block::classname(), ['blockId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassesEnrolleds()
    {
        return $this->hasMany(ClassesEnrolled::className(), ['enrolId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['id' => 'studentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Programs::className(), ['id' => 'programId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Levels::className(), ['id' => 'levelId']);
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
    public function getSection()
    {
        return $this->hasOne(Sections::className(), ['id' => 'sectionId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdviser0()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'adviser']);
    }

    public function getLevelStr() {
        if($this->program) {
            return $this->program->shortName . " - " . $this->level->shortName;
        }else {
            return $this->level->longName;
        }
    }

    public function conflict($class) {
        foreach($class->schedules as $sched) {
            $startPlus = date('H:i', strtotime($sched->start)+100);
            $endDown = date('H:i', strtotime($sched->end)-50);

            $command = Yii::$app->db->createCommand("SELECT `s`.`id`, `s`.`days` FROM `schedules` `s`
                LEFT JOIN `classes` `c` ON `s`.`classId`=`c`.`id` 
                LEFT JOIN `classesEnrolled` `ce` ON `c`.`id`=`ce`.`classId`
                WHERE (`s`.`start` BETWEEN :st AND :endd 
                       OR `s`.`end` BETWEEN :stp AND :end)
                AND `ce`.`enrolId` = :enrolId");
            $command->bindValue(':st', $sched->start);
            $command->bindValue(':stp', $startPlus);
            $command->bindValue(':end', $sched->end);
            $command->bindValue(':endd', $endDown);
            $command->bindValue(':enrolId', $this->id);

            $data = $command->queryAll();

            $thisDays = explode(',', $sched->days);

            foreach($data as $s) {
                $days = explode(',', $s['days']);
                foreach($thisDays as $thisday){
                    if(array_search($thisday, $days)){
                        return $s['id'];
                    }
                }
            }
        }
        
        return false;
    }

    public function duplicateCourse($class) {
        foreach($this->classesEnrolleds as $classEnrolled) {
            if($classEnrolled->class->courseId===$class->courseId){
                return $classEnrolled->class->course;
            }
        }
        return false;
    }

    public function notYetEnrolled($classId) {
        foreach($this->classesEnrolleds as $classEnrolled) {
            if($classEnrolled->class->id===$classId) return false;
        }
        return true;
    }
}
