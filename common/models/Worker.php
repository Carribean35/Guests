<?php

/**
 * This is the model class for table "worker".
 *
 * The followings are the available columns in table 'worker':
 * @property integer $id
 * @property string $name
 * @property string $post
 * @property string $text
 * @property integer $visible
 */
class Worker extends EActiveRecord
{
	
	private $_imagesPath;
	private $_imagesUrl;
	
	public $image;
	
	
	public function init()
	{
		parent::init();
		$this->_imagesPath = Yii::getPathOfAlias('common').'/data/team/worker/';
		$this->_imagesUrl = '/data/team/worker/';
	}
	
	public function getImagesPath() {
		return $this->_imagesPath;
	}
	
	public function getImagesUrl() {
		return $this->_imagesUrl;
	}
	
	public function existImage() {
		return file_exists($this->imagesPath.$this->id);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'worker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, post', 'required'),
			array('visible', 'numerical', 'integerOnly'=>true),
			array('name, post', 'length', 'max'=>64),
			array('text, visible', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, post, text, visible', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('main', 'ID'),
			'name' => Yii::t('main', 'FName'),
			'visible' => Yii::t('main', 'Visible'),
			'post' => Yii::t('main', 'Post'),
			'text' => Yii::t('main', 'Text'),
			'image' => Yii::t('main', 'Image'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Worker the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function deleteFull() {
		if (file_exists($this->imagesPath.$this->id))
			unlink($this->imagesPath.$this->id);
		$this->delete();
	}
}