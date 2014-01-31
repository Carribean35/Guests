<?php

class Job extends CFormModel
{

	public $id = 1;
	public $text;
    public $formId = 'job-form';
    private $file;
    
    private $_imagesPath;
    private $_imagesUrl;
    private $_imageSizes;
    
    public $image;
    
    public function getImagesPath() {
    	return $this->_imagesPath;
    }
    public function setImagesPath($data) {
    	$this->_imagesPath = $data;
    }
    
    public function getImagesUrl() {
    	return $this->_imagesUrl;
    }
    public function setImagesUrl($data) {
    	$this->_imagesUrl = $data;
    }
    
    public function getImageSizes() {
    	return $this->_imageSizes;
    }
    public function setImageSizes($data) {
    	$this->_imageSizes = $data;
    }
    
    public function init()
    {
    	parent::init();
    	$this->imagesPath = Yii::getPathOfAlias('common').'/data/team/job/';
    	$this->imagesUrl = '/data/team/job/';
    	$this->imageSizes = array(array(665, false));
    	
    	
    	$this->file = YiiBase::getPathOfAlias('common').'/data/team/job/job.txt';
    	
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
			'image' => Yii::t('main', 'Image'),
		);
	}
	
	public function saveImage($filePath) {
		if (!file_exists($this->imagesPath.'original/'))
			mkdir($this->imagesPath.'original/');
		if (!file_exists($this->imagesPath.'admin_preview/'))
			mkdir($this->imagesPath.'admin_preview/');
			
		$ih = Yii::app()->ih
		->load($filePath)
		->save($this->imagesPath.'original/'.$this->id)
		->adaptiveThumb(200,150)
		->save($this->imagesPath.'admin_preview/'.$this->id);
			
		foreach ($this->imageSizes AS $key => $val) {
			if (!file_exists($this->imagesPath.$val[0].'x'.$val[1].'/'))
				mkdir($this->imagesPath.$val[0].'x'.$val[1].'/');
			$ih->reload();
			if ($val[0] == false || $val[1] == false) {
				if (!empty($val[0]) && $ih->getWidth() > $val[0] || !empty($val[1]) && $ih->getHeight() > $val[1])
					$ih->resize($val[0], $val[1]);
			} else {
				$ih->adaptiveThumb($val[0], $val[1]);
			}
			$ih->save($this->imagesPath.$val[0].'x'.$val[1].'/'.$this->id);
		}
	}
	
	public function deleteFull() {
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
