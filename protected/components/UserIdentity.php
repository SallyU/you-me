<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public $user;
    public $_id;
    public $username;
    public function authenticate()
    {
        $this->errorCode=self::ERROR_PASSWORD_INVALID;
        $user=User::model()->find('name=:username',array(':username'=>$this->username));
        if ($user)
        {
            $encrypted_passwd=trim($user->password);
            $inputpassword = trim(md5($this->password));
            if($inputpassword===$encrypted_passwd)
            {
                $this->errorCode=self::ERROR_NONE;
                $this->setUser($user);
                $this->_id=$user->userid;
                $this->username=$user->name;
                //if(isset(Yii::app()->user->thisisadmin))
                // unset (Yii::app()->user->thisisadmin);
            }
            else
            {
                $this->errorCode=self::ERROR_PASSWORD_INVALID;

            }
        }
        else
        {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }

        unset($user);
        return !$this->errorCode;

    }
    public function getUser()
    {
        return $this->user;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function setUser(CActiveRecord $user)
    {
        $this->user=$user->attributes;
    }
}