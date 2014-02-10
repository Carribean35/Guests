<?php
/**
 *
 * AboutController class
 *
 */
class AboutController extends FController
{
	public function actionIndex()
	{

		$about = new About();
		
		$criteria=new CDbCriteria;
		$criteria->condition = "visible = 1";
		$filials = Filial::model()->findAll($criteria);
		
		$gallerys = array();
		foreach($filials AS $key => $val) {
			$filialGallery = new FilialGallery($val->id);
			$gallerys[$val->id] = $filialGallery; 
		}
		
		$this->render('index', array('about' => $about, 'filials' => $filials, 'gallerys' => $gallerys));
	}

}