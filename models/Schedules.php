<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedules".
 *
 * @property integer $id
 * @property integer $classId
 * @property string $start
 * @property string $end
 * @property string $days
 * @property integer $venueId
 *
 * @property Venues $venue
 * @property Classes $class
 */
class Schedules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classId', 'start', 'end', 'days', 'venueId'], 'required'],
            [['classId', 'venueId'], 'integer'],
            [['start', 'end'], 'safe'],
            [['days'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'classId' => 'Class ID',
            'start' => 'Start',
            'end' => 'End',
            'days' => 'Days',
            'venueId' => 'Venue ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenue()
    {
        return $this->hasOne(Venues::className(), ['id' => 'venueId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classes::className(), ['id' => 'classId']);
    }

    public function conflict() {
        $startPlus = date('H:i', strtotime($this->start)+100);
        $endDown = date('H:i', strtotime($this->end)-50);

        $command = Yii::$app->db->createCommand(
            "SELECT `s`.`id`, `s`.`days` FROM `schedules` `s` 
                LEFT JOIN `classes` `c` ON `s`.`classId`=`c`.`id` 
                LEFT JOIN `periods` `p` ON `c`.`periodId`=`p`.`id`
                WHERE (`s`.`start` BETWEEN :st AND :endd 
                OR `s`.`end` BETWEEN :stp AND :end)
                AND (venueId=:venue OR `c`.`teacherId`=:teacher)
                AND `p`.`active`=1");
        $command->bindValue(':st', $this->start);
        $command->bindValue(':endd', $endDown);
        $command->bindValue(':stp', $startPlus);
        $command->bindValue(':end', $this->end);
        $command->bindValue(':venue', $this->venueId);
        $command->bindValue(':teacher', $this->class->teacherId);
        $data = $command->queryAll();

        $thisDays = explode(',', $this->days);

        foreach($data as $s) {
            $days = explode(',', $s['days']);
            foreach($thisDays as $thisday){
                if(array_search($thisday, $days)){
                    return $s['id'];
                }
            }
        }
        
        return false;
    }
}
