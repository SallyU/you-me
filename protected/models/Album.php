<?php

/**
 * This is the model class for table "{{album}}".
 *
 * The followings are the available columns in table '{{album}}':
 * @property integer $albumid
 * @property string $albumname
 * @property integer $albumopen
 * @property string $albumcover
 * @property string $albumdesc
 * @property string $userid
 * @property string $cateid
 * @property string $createtime
 */
class Album extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Album the static model class
	 */
    public $albumopen = array(
        '0'=>'-是否公开-',
        '1'=>'公开',
        '2'=>'自己可见',
    );
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{album}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('albumname', 'length', 'min'=>2,'max'=>24,'tooShort'=>'哎哟喂，太短了(至少要2个字)','tooLong'=>'妈呀，你想撑死数据库么'),
            array('albumname,albumdesc','required','message'=>'什么都不填，你当我傻么'),
            array('albumname','unique','message'=>'已经有这个相册了，换个试试'),
            array('albumdesc', 'length', 'min'=>4,'max'=>60,'tooShort'=>'哎哟喂，太短了(至少要4个字)','tooLong'=>'妈呀，你想撑死数据库么'),
            array('albumcover', 'file', 'types'=>'jpg, gif, png, jpeg','allowEmpty' =>true,'maxSize'=>1024*1024*8,'tooLarge'=>'文件大于8M，上传失败！请上传小于8M的文件'),
            //验证是否公开(信息在0到2之间则表示有选择，否则没有)，1正则；2范围限制
            array('albumopen','in','range'=>array(1,2),'message'=>'请确定是否公开相册'),
            array('userid, cateid,createtime', 'safe'),
            // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('albumid, albumname, albumopen, albumcover, albumdesc, userid, cateid, createtime', 'safe', 'on'=>'search'),
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
            'albumcate' => array(self::BELONGS_TO, 'Albumcate', 'cateid'),
            'photos' => array(self::HAS_MANY, 'Photo', 'albumid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
	        'albumid' => Yii::t('album','Albumid'),
	        'albumname' => Yii::t('album','Albumname'),
	        'albumopen' => Yii::t('album','Albumopen'),
	        'albumcover' => Yii::t('album','Albumcover'),
	        'albumdesc' => Yii::t('album','Albumdesc'),
	        'userid' => Yii::t('album','Userid'),
	        'cateid' => Yii::t('album','Cateid'),
	        'createtime' => Yii::t('album','Createtime'),
		);
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

		$criteria->compare('albumid',$this->albumid);
		$criteria->compare('albumname',$this->albumname);
		$criteria->compare('albumopen',$this->albumopen);
		$criteria->compare('albumcover',$this->albumcover);
		$criteria->compare('albumdesc',$this->albumdesc);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('cateid',$this->cateid);
		$criteria->compare('createtime',$this->createtime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        

}