<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blockClasses".
 *
 * @property integer $id
 * @property integer $classId
 * @property integer $blockId
 *
 * @property Classes $class
 * @property Blocks $block
 */
class BlockClasses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blockClasses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classId', 'blockId'], 'required'],
            [['classId', 'blockId'], 'integer']
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
            'blockId' => 'Block ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classes::className(), ['id' => 'classId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlock()
    {
        return $this->hasOne(Blocks::className(), ['id' => 'blockId']);
    }
}
