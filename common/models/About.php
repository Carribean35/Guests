<?php

class About extends CFormModel
{

	public $id = 1;
	public $text;
    public $formId = 'job-form';
    private $file;
    
    public function init()
    {
    	parent::init();
    	
    	$this->file = YiiBase::getPathOfAlias('common').'/data/about/about.txt';
    	
    	if (file_exists($this->file)) {
    		$this->text = file_get_contents($this->file);
    	}
    }
    
	public function rules()
    {
        return array(
            array('text', 'safe'),
		);
    }
	
	public function save() {
 		file_put_contents($this->file, $this->text);
		return true;
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'text' => Yii::t('main', 'Text'),
		);
	}
}
