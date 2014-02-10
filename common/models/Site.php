<?php

class Site extends CFormModel
{

	public $email;
	public $phone;
	public $vkLink;
	public $facebookLink;
	public $instakLink;
	public $foursquareLink;
	public $twitterLink;
	public $formId = 'site-form';
    private $file;
    
    public function init()
    {
    	parent::init();
    	$this->file = YiiBase::getPathOfAlias('common').'/data/site/site.txt';
    	
    	if (file_exists($this->file)) {
    		
    		$json = file_get_contents($this->file);
    		$obj = CJSON::decode($json);
    		$this->attributes = $obj;
    	}
    	
    }
    
	public function rules()
    {
        return array(
        	array('email', 'email'),
        	array('vkLink, facebookLink, instakLink, foursquareLink, twitterLink', 'url'),
            array('phone', 'safe'),
		);
    }
	
	public function save() {
		$json = CJSON::encode($this);
 		file_put_contents($this->file, $json);
		return true;
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'email' => Yii::t('main', 'Email'),
			'phone' => Yii::t('main', 'Phone'),
			'vkLink' => Yii::t('main', 'vkLink'),
			'facebookLink' => Yii::t('main', 'facebookLink'),
			'instakLink' => Yii::t('main', 'instakLink'),
			'foursquareLink' => Yii::t('main', 'foursquareLink'),
			'twitterLink' => Yii::t('main', 'twitterLink'),
		);
	}
	
}
