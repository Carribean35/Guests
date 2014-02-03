<?php

/**
 * This is the model class for table "resume".
 *
 * The followings are the available columns in table 'resume':
 * @property integer $id
 * @property string $fio
 * @property string $nationality
 * @property string $address
 * @property string $birthDate
 * @property integer $workPlace
 * @property string $phone
 * @property string $lastWork
 * @property integer $workType
 * @property string $wantPost
 * @property string $wantSchedule
 */
class Resume extends EActiveRecord
{
	public $workPlaces = array(0 => "Могу работать везде", 
								1 => "Софьи Перовской 42",
								2 => "Цюрупа 12");
	
	public $workTypes = array(0 => "Основная работа", 
								1 => "Работа по совместительству",
								2 => "Работа в свободное от учёбы время");
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'resume';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('fio, nationality, address, birthDate, workPlace, phone, lastWork, workType, wantPost, wantSchedule', 'required'),
//			array('workPlace, workType', 'numerical', 'integerOnly'=>true),
//			array('fio, address', 'length', 'max'=>64),
//			array('nationality, phone', 'length', 'max'=>32),
//			array('lastWork, wantPost, wantSchedule', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fio, nationality, address, birthDate, workPlace, phone, lastWork, workType, wantPost, wantSchedule', 'safe'),
			array('id, fio, nationality, address, birthDate, workPlace, phone, lastWork, workType, wantPost, wantSchedule', 'safe', 'on'=>'search'),
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
			'fio' => Yii::t('main', 'FIO'),
			'nationality' => Yii::t('main', 'Nationality'),
			'address' => Yii::t('main', 'Address'),
			'birthDate' => Yii::t('main', 'Birth Date'),
			'workPlace' => Yii::t('main', 'Work Place'),
			'phone' => Yii::t('main', 'Phone'),
			'lastWork' => Yii::t('main', 'Last Work'),
			'workType' => Yii::t('main', 'Work Type'),
			'wantPost' => Yii::t('main', 'Want Post'),
			'wantSchedule' => Yii::t('main', 'Want Schedule'),
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
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('birthDate',$this->birthDate,true);
		$criteria->compare('workPlace',$this->workPlace);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('lastWork',$this->lastWork,true);
		$criteria->compare('workType',$this->workType);
		$criteria->compare('wantPost',$this->wantPost,true);
		$criteria->compare('wantSchedule',$this->wantSchedule,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resume the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
