<?php

/**
 * This is the model class for table "{{albumcate}}".
 *
 * The followings are the available columns in table '{{albumcate}}':
 * @property string $cateid
 * @property string $catename
 * @property string $createtime
 */
class Albumcate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Albumcate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{albumcate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('catename', 'length', 'min'=>2,'max'=>64,'tooShort'=>'哎哟喂，太短了(至少要2个字)','tooLong'=>'妈呀，你想撑死数据库么'),
            array('catename','required','message'=>'什么都不填，你当我傻么'),
            array('catename','unique','message'=>'已经有这个类别了，换个试试'),
			array('createtime', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cateid, catename, createtime', 'safe', 'on'=>'search'),
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
	        'cateid' => Yii::t('albumcate','Cateid'),
	        'catename' => Yii::t('albumcate','相册类别名称'),
	        'createtime' => Yii::t('albumcate','Createtime'),
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

		$criteria->compare('cateid',$this->cateid);
		$criteria->compare('catename',$this->catename);
		$criteria->compare('createtime',$this->createtime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        

}