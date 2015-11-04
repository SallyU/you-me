<?php

/**
 * UserIdentity represents the data needed to identity a index.
 * It contains the authentication method that checks if the provided
 * data can identity the index.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a index.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent index identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	/*public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}*/
    public function authenticate()
    {

        //校验username和password的真实性,根据用户名查询是否有相关信息
        $model = User::model()->find('name=:name',array(':name'=>$this->name));

        //如果用户名不存在
        if($model === null){
            $this -> errorCode = self::ERROR_USERNAME_INVALID;
            return false;
        } else if ($model->password !== md5($this -> password)){
            //密码判断,此处将需要验证的密码进行MD5加密再做比较
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
            return false;
        } else {

            //$model->last_login_time=update_time();
            //$model->last_login_ip=Yii::app()->request->UserHostAddress;//IP地址
            //$model->save(false);
            //设置session信息
            $this->setState('username',$model->name);
            $this->setState('userid',$model->userid);
            //$this->setState('introduce',$model->introduce);

            $this->errorCode=self::ERROR_NONE;
            return true;
        }
    }
    
    
}