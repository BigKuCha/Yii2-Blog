<?php

namespace app\models;
use app\models\Tuser;
use yii\helpers\ArrayHelper;
class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $address;
    public $authKey;
    public $accessToken;
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
//        $user = Tuser::findOne($id)->attributes;
        $user = ArrayHelper::toArray(Tuser::findOne($id));
        if($user)
        {
            $user['authKey'] = md5($user['id']);
            return new static($user);
        }
        else
            return null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = Tuser::findOne($id);
        if($user)
            return new static($user);
        else
            return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = Tuser::find()->where('username=:u',[':u'=>$username])->asArray()->one();
        if($user)
           return new static($user);
        return null;
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
        return $this->password === $password;
    }
}
