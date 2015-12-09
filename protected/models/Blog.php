<?php

/**
 * This is the model class for table "{{blog}}".
 *
 * The followings are the available columns in table '{{blog}}':
 * @property string $id
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property string $keywords
 * @property string $img
 * @property integer $commentid
 * @property integer $categoryid
 * @property string $asset
 * @property integer $mind_time
 * @property integer $create_time
 * @property string $uid
 */
class Blog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Blog the static model class
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
		return '{{blog}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, status, keywords, img, commentid, categoryid, asset, mind_time, create_time, uid', 'required'),
			array('status, commentid, categoryid, mind_time, create_time', 'numerical', 'integerOnly'=>true),
			array('title, keywords', 'length', 'max'=>255),
			array('img', 'length', 'max'=>128),
			array('uid', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, status, keywords, img, commentid, categoryid, asset, mind_time, create_time, uid', 'safe', 'on'=>'search'),
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
	        'id' => Yii::t('blog','ID'),
	        'title' => Yii::t('blog','Title'),
	        'content' => Yii::t('blog','Content'),
	        'status' => Yii::t('blog','Status'),
	        'keywords' => Yii::t('blog','Keywords'),
	        'img' => Yii::t('blog','Img'),
	        'commentid' => Yii::t('blog','Commentid'),
	        'categoryid' => Yii::t('blog','Categoryid'),
	        'asset' => Yii::t('blog','Asset'),
	        'mind_time' => Yii::t('blog','Mind Time'),
	        'create_time' => Yii::t('blog','Create Time'),
	        'uid' => Yii::t('blog','Uid'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title);
		$criteria->compare('content',$this->content);
		$criteria->compare('status',$this->status);
		$criteria->compare('keywords',$this->keywords);
		$criteria->compare('img',$this->img);
		$criteria->compare('commentid',$this->commentid);
		$criteria->compare('categoryid',$this->categoryid);
		$criteria->compare('asset',$this->asset);
		$criteria->compare('mind_time',$this->mind_time);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('uid',$this->uid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        

}