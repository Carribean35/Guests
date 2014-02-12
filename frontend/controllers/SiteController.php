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
		
		$recommended = $menuController->recommendedBlock();

		$this->render('index', array('newsMainBlock' => $newsMainBlock, 'menuMainBlock' => $menuMainBlock, 'mainGallery' => $mainGallery, 'check' => $check, 'recommended' => $recommended));
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
	
	public function actionCallMeSubmit() {
		if (!empty($_POST)) {
			$callMe['name'] = $_POST['name'];
			$callMe['phone'] = $_POST['phone'];
			$callMe['comment'] = $_POST['comment'];
		
			$mailBlank = $this->renderPartial("//mailBlank/callMe", array("callMe" => $callMe), true);
				
			$site = new Site();
			
			SendMail::send($site->emailAdmin, "Заказать звонок", $mailBlank);
		
		}
		
		echo CJSON::encode(
			array(
				'error'=>false,
			)
		);
		Yii::app()->end();
	}
}