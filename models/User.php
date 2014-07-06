<?php

namespace app\models;

use Yii;
use yii\helpers\Security;

/**
 * This is the model class for table "t_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $address
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    const SECRET = "fljaljlgrg43ll";

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 255]
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
            'address' => 'Address',
        ];
    }
    public static function findByUsername($username)
    {
        $user = self::find()->where('username=:u',[':u'=>$username])->one();
        return $user;
    }
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    public static function findIdentity($id)
    {
        $user = static::findOne($id)->attributes;
        $user['authKey'] = md5($id);
        return new static($user);
//        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne($id);
    }
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    public function getAuthKey()
    {
        return md5($this->getPrimaryKey());
    }
    public function validateAuthKey($authKey)
    {
        return $authKey===md5($this->id);
    }
}
