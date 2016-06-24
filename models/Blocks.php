<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blocks".
 *
 * @property integer $id
 * @property string $name
 * @property integer $periodId
 * @property integer $levelId
 * @property integer $userId
 *
 * @property BlockClasses[] $blockClasses
 * @property Periods $period
 * @property Levels $level
 * @property User $user
 */
class Blocks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'periodId', 'levelId', 'userId'], 'required'],
            [['periodId', 'levelId', 'userId'], 'integer'],
            [['name'], 'string', 'max' => 125]
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
            'periodId' => 'Period ID',
            'levelId' => 'Level ID',
            'userId' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlockClasses()
    {
        return $this->hasMany(BlockClasses::className(), ['blockId' => 'id']);
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
    public function getLevel()
    {
        return $this->hasOne(Levels::className(), ['id' => 'levelId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
