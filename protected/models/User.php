<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $userid
 * @property string $name
 * @property string $password
 * @property string $createtime
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
    public $passwordConfirm;//确认密码定义
    public $verifyCode;//定义验证码

    public $oldpass;
    public $newpass;
    public $newpass2;



	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('name', 'length', 'min'=>2,'max'=>16,'tooShort'=>'哎哟喂，太短了','tooLong'=>'妈呀，你想撑死数据库么'),
            array('name','required','message'=>'什么都不填，你当我傻么'),
            array('name','unique','message'=>'这个名字太受欢迎了,PLZ 换个'),
            array('password,passwordConfirm', 'length', 'min'=>4, 'max'=>22, 'tooShort'=>'我去，太短了，NO','tooLong'=>'已经够安全了，不要多输'),
            array('password','required','message'=>'为了安全,请穿上安全裤'),
            array('passwordConfirm','required','message'=>'以防你忘记，再次提醒穿上一样的安全裤   '),
            array('passwordConfirm','compare','compareAttribute'=>'password','message'=>'第二个安全裤和第一个姿势不一样'),//passwordComfirm的值必须和password相同
            //array('verifyCode','required','message'=>'难道你是机器人?'),
            //array('verifyCode','captcha','message'=>'擦亮眼睛.再输一次'),
            array('createtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userid, name, password, createtime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
	        'userid' => Yii::t('user','Userid'),
	        'name' => '用户名',
	        'password' => '密码',
	        'passwordConfirm' => '确认密码',
            'verifyCode' => '验证码',
	        'createtime' => Yii::t('user','Createtime'),
		);
	}

    /**
     * @return array verifyCode 设置
     */
    /*public function safeAttributes()
    {
        return array(
            'verifyCode','xx','yy','aa','zz','00','11','33',);
    }*/

    /**
     * 保存注册时间和密码进行MD5加密
     */
    public function beforeSave()
    {
        if (parent::beforeSave()){
            if($this->isNewRecord){
                //md5加密与检查confirmPassword
                $this->password = md5($this->password);
                $this->passwordConfirm = md5($this->passwordConfirm);

                $this->createtime=time();
            }
            return true;//必须以return为true，才能将数据写入数据库
        }else{
            return false;
        }
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('userid',$this->userid);
		$criteria->compare('name',$this->name);
		$criteria->compare('password',$this->password);
		$criteria->compare('createtime',$this->createtime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        

}