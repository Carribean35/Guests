<?php

/**
 * This is the model class for table "dish".
 *
 * The followings are the available columns in table 'dish':
 * @property integer $id
 * @property integer $pid
 * @property string $name
 * @property string $text
 * @property integer $price
 * @property integer $weight
 * @property integer $recommended
 * @property integer $visible
 */
class Dish extends EActiveRecord
{
	
	private $_imagesPath;
	private $_imagesUrl;
	private $_imageSizes = array(array(440, 452), array(199, 129));
	
	public $image;
	
	
	public function init()
	{
		parent::init();
		$this->_imagesPath = Yii::getPathOfAlias('common').'/data/menu/dish/';
		$this->_imagesUrl = '/data/menu/dish/';
	}
	
	public function getImagesPath() {
		return $this->_imagesPath;
	}
	
	public function getImagesUrl() {
		return $this->_imagesUrl;
	}
	
	public function getImageSizes() {
		return $this->_imageSizes;
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dish';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, name, text, price, weight', 'required'),
			array('pid, price, weight, recommended, visible', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('text', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pid, name, text, price, weight, recommended, visible', 'safe', 'on'=>'search'),
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
			'pid' => Yii::t('main', 'Pid'),
			'name' => Yii::t('main', 'Name'),
			'text' => Yii::t('main', 'Text'),
			'price' => Yii::t('main', 'Price'),
			'weight' => Yii::t('main', 'Weight'),
			'recommended' => Yii::t('main', 'Recommended'),
			'visible' => Yii::t('main', 'Visible'),
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('recommended',$this->recommended);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dish the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function deleteDish() {
		if (file_exists($this->imagesPath.'original/'.$this->id))
			unlink($this->imagesPath.'original/'.$this->id);
		if (file_exists($this->imagesPath.'admin_preview/'.$this->id))
			unlink($this->imagesPath.'admin_preview/'.$this->id);

		foreach($this->_imageSizes AS $key => $val) {
			if (file_exists($this->imagesPath.$val[0].'x'.$val[1].'/'.$this->id))
				unlink($this->imagesPath.$val[0].'x'.$val[1].'/'.$this->id);
		}

		$this->delete();
	}
}
