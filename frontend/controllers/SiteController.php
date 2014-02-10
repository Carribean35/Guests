<?php
/**
 *
 * SiteController class
 *
 */
class SiteController extends FController
{
	public function actionIndex()
	{
		
		$mainGallery = new MainGallery();
		
		list($newsController) = Yii::app()->createController('news');
		$newsMainBlock = $newsController->newsMainBlock();
		
		list($menuController) = Yii::app()->createController('menu');
		$menuMainBlock = $menuController->menuMainBlock();
		
		$check = $menuController->check();

		$this->render('index', array('newsMainBlock' => $newsMainBlock, 'menuMainBlock' => $menuMainBlock, 'mainGallery' => $mainGallery, 'check' => $check));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}