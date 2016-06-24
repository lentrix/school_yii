<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property integer $role
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    const USER_STUDENT = 10;
    const USER_TEACHER = 20;
    const USER_HEAD = 30;
    const USER_SA = 50;
    const USER_GUIDANCE = 60;
    const USER_CASHIER = 70;
    const USER_REGISTRAR = 80;
    const USER_ADMIN = 100;

    public static function getRoles() {
        return $roles = [
            10 => 'Student',
            20 => 'Teacher',
            30 => 'Head',
            50 => 'Student Affairs',
            60 => 'Guidance Counselor',
            70 => 'Cashier',
            80 => 'Registrar',
            100 => 'System Administrator',
        ];
    }

    public function getRoleName() {
        return static::getRoles()[$this->role];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role'], 'required'],
            [['picPath'], 'string', 'max' => 255],
            [['role','divisionId', 'collegeId', 'linkId'], 'integer'],
            [['username', 'authKey', 'accessToken'], 'string', 'max' => 25],
            [['password'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'role' => 'Role',
            'divisionId' => 'Division',
            'collegeId' => 'College',
            'picPath' => 'Picture',
            'linkId' => 'Link ID'
        ];
    }

    public function getDivision()
    {
        return $this->hasOne(\app\models\Divisions::className(), ['id' => 'divisionId']);
    }

    public function getCollege()
    {
        return $this->hasOne(\app\models\Colleges::className(), ['id' => 'collegeId']);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken'=>$token]);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === MD5($password);
    }
}
