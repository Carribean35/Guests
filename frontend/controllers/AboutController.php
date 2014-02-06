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
		
		$this->render('index', array('about' => $about, 'filials' => $filials));
	}

}