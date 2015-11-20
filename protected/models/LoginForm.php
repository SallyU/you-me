<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
    public $name;
    public $password;
    public $rememberMe;
    public $verifyCode;

    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that name and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // name and password are required
            array('name', 'required','message'=>'用户名不能为空'),
            array('password', 'required','message'=>'密码不能为空'),
            //验证码校验
            //array('verifyCode','captcha','message'=>'验证码输入错误,请重新输入'),


            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            array('verifyCode', 'captcha', 'allowEmpty'=>$this->checkVerifyCode(), 'on'=>'login'),//注意on是场景，用于登录

            // password needs to be authenticated,调用下面的attributes方法，
            array('password', 'authenticate'),


        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'name'=>'用户名',
            'password'=>'密  码',
            'rememberMe'=>'十天内免登录',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->_identity=new UserIdentity($this->name,$this->password);
            if(!$this->_identity->authenticate())
                $this->addError('password','用户名或者密码错误');
        }
    }


    /**
     * Logs in the user using the given name and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        if($this->_identity===null)
        {
            $this->_identity=new UserIdentity($this->name,$this->password);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
        {
            $duration=$this->rememberMe ? 3600*24*10 : 0; // 10 days

            Yii::app()->user->login($this->_identity,$duration);
            return true;
        }
        else
            return false;
    }

    //验证码,用于用户输错3次显示验证码验证
    public function checkVerifyCode()
    {
        if (isset($_POST['user'])){
            $error_msg = '验证码输入不正确.';
            $loginErrorTimes = (int)Yii::app()->session['login_error_times'];
            if ($loginErrorTimes > 0) {
                $loginErrorTimes++;
            }else{
                $loginErrorTimes = 1;
            }
            Yii::app()->session['login_error_times'] = $loginErrorTimes;
            if ($loginErrorTimes > 3) {
                $verifyCode = trim($this->verifyCode);
                $captcha = Yii::app()->controller->createAction('captcha')->getVerifyCode();
                if (strtolower($captcha) == strtolower($verifyCode)) {
                    return true;
                }else{
                    $this->addError('verifyCode', $error_msg);
                    return false;
                }
            }
        }
        return true;
    }
}