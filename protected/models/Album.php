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
			array('albumopen', 'numerical', 'integerOnly'=>true),
			array('albumname', 'length', 'max'=>128),
			array('albumdesc', 'length', 'max'=>1000),
			array('userid, cateid', 'length', 'max'=>11),
			array('createtime', 'length', 'max'=>32),
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