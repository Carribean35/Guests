<?php

class MainGallery extends CFormModel
{

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
    	$this->imagesPath = Yii::getPathOfAlias('common').'/data/main/gallery/';
    	$this->imagesUrl = '/data/main/gallery/';
    	$this->imageSizes = array(array(655, 346));
    }
    
	public function saveImage($filePath) {
		if (!file_exists($this->imagesPath.'original/'))
			mkdir($this->imagesPath.'original/');
		if (!file_exists($this->imagesPath.'admin_preview/'))
			mkdir($this->imagesPath.'admin_preview/');
			
		$name = md5(strtotime("now").mt_rand(0,10000));
		$ih = Yii::app()->ih
		->load($filePath)
		->save($this->imagesPath.'original/'.$name.".jpg")
		->adaptiveThumb(200,150)
		->save($this->imagesPath.'admin_preview/'.$name.".jpg");
			
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
			$ih->save($this->imagesPath.$val[0].'x'.$val[1].'/'.$name.".jpg");
		}
	}
	
	public function getImages() {
		if (!file_exists($this->imagesPath."original/"))
			return array();
		$images = scandir($this->imagesPath."original/");
		$imgs = array();
		foreach ($images AS &$image) {
			if(preg_match('/\.(jpeg|jpg)/', $image)){
				$imgs[] = $image;
			}
		}
		return $imgs;
	}
	
	public function deleteImage($name) {
		if (file_exists($this->imagesPath.'original/'.$name))
			unlink($this->imagesPath.'original/'.$name);
		if (file_exists($this->imagesPath.'admin_preview/'.$name))
			unlink($this->imagesPath.'admin_preview/'.$name);
	
		foreach($this->_imageSizes AS $key => $val) {
			if (file_exists($this->imagesPath.$val[0].'x'.$val[1].'/'.$name))
				unlink($this->imagesPath.$val[0].'x'.$val[1].'/'.$name);
		}
	}
	
}
