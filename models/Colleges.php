<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colleges".
 *
 * @property integer $id
 * @property string $shortName
 * @property string $longName
 * @property string $head
 * @property string $headTitle
 *
 * @property Classes[] $classes
 * @property Programs[] $programs
 */
class Colleges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colleges';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shortName', 'longName', 'head', 'headTitle'], 'required'],
            [['shortName', 'headTitle'], 'string', 'max' => 25],
            [['longName', 'head'], 'string', 'max' => 125]
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
            'head' => 'Head',
            'headTitle' => 'Head Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasses()
    {
        return $this->hasMany(Classes::className(), ['collegeId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Programs::className(), ['collegeId' => 'id']);
    }
}
