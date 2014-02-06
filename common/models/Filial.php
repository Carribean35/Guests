<?php

/**
 * This is the model class for table "filial".
 *
 * The followings are the available columns in table 'filial':
 * @property integer $id
 * @property string $addressStreet
 * @property string $addressHouse
 * @property string $text
 * @property integer $smoking
 * @property integer $nosmoking
 * @property integer $hall
 * @property integer $wifi
 * @property integer $vip
 * @property string $phone
 * @property integer $visible
 */
class Filial extends EActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'filial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('addressStreet, addressHouse, phone', 'required'),
			array('smoking, nosmoking, hall, wifi, vip, visible', 'numerical', 'integerOnly'=>true),
			array('addressStreet, phone', 'length', 'max'=>32),
			array('addressHouse', 'length', 'max'=>16),
			array('smoking, nosmoking, hall, wifi, vip, phone, text, visible', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, addressStreet, addressHouse, text, smoking, nosmoking, hall, wifi, vip, phone, visible', 'safe', 'on'=>'search'),
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
			'addressStreet' => Yii::t('main', 'Address Street'),
			'addressHouse' => Yii::t('main', 'Adderss House'),
			'text' => Yii::t('main', 'Text'),
			'smoking' => Yii::t('main', 'Smoking'),
			'nosmoking' => Yii::t('main', 'Nosmoking'),
			'hall' => Yii::t('main', 'Hall'),
			'wifi' => Yii::t('main', 'Wifi'),
			'vip' => Yii::t('main', 'Vip'),
			'phone' => Yii::t('main', 'Phone'),
			'visible' => Yii::t('main', 'Visible'),
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
		$criteria->compare('addressStreet',$this->addressStreet,true);
		$criteria->compare('addressHouse',$this->addressHouse,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('smoking',$this->smoking);
		$criteria->compare('nosmoking',$this->nosmoking);
		$criteria->compare('hall',$this->hall);
		$criteria->compare('wifi',$this->wifi);
		$criteria->compare('vip',$this->vip);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Filial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
