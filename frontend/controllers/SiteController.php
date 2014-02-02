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
		
		list($newsController) = Yii::app()->createController('news');
		$newsMainBlock = $newsController->newsMainBlock();
		
		list($menuController) = Yii::app()->createController('menu');
		$menuMainBlock = $menuController->menuMainBlock();

		$this->render('index', array('newsMainBlock' => $newsMainBlock, 'menuMainBlock' => $menuMainBlock));
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