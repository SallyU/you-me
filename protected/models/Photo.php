<?php

/**
 * This is the model class for table "{{photo}}".
 *
 * The followings are the available columns in table '{{photo}}':
 * @property integer $picid
 * @property string $pictitle
 * @property integer $picopen
 * @property string $picUrl
 * @property string $smallPicUrl
 * @property string $picdesc
 * @property string $userid
 * @property string $albumid
 * @property string $createtime
 * @property integer $love
 */
class Photo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Photo the static model class
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
		return '{{photo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('picopen, love', 'numerical', 'integerOnly'=>true),
			array('pictitle, picUrl, smallPicUrl', 'length', 'max'=>128),
			array('picdesc', 'length', 'max'=>1000),
			array('userid, albumid', 'length', 'max'=>11),
			array('createtime', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('picid, pictitle, picopen, picUrl, smallPicUrl, picdesc, userid, albumid, createtime, love', 'safe', 'on'=>'search'),
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
            'album' => array(self::BELONGS_TO, 'Album', 'albumid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
	        'picid' => Yii::t('photo','Picid'),
	        'pictitle' => Yii::t('photo','Pictitle'),
	        'picopen' => Yii::t('photo','Picopen'),
	        'picUrl' => Yii::t('photo','Pic Url'),
	        'smallPicUrl' => Yii::t('photo','Small Pic Url'),
	        'picdesc' => Yii::t('photo','Picdesc'),
	        'userid' => Yii::t('photo','Userid'),
	        'albumid' => Yii::t('photo','Albumid'),
	        'createtime' => Yii::t('photo','Createtime'),
	        'love' => Yii::t('photo','Love'),
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

		$criteria->compare('picid',$this->picid);
		$criteria->compare('pictitle',$this->pictitle);
		$criteria->compare('picopen',$this->picopen);
		$criteria->compare('picUrl',$this->picUrl);
		$criteria->compare('smallPicUrl',$this->smallPicUrl);
		$criteria->compare('picdesc',$this->picdesc);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('albumid',$this->albumid);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('love',$this->love);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        

}