<?php
/**
 *
 * SiteController class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class SiteController extends RController
{
	public function actionIndex()
	{
		$site = new Site();
		
		if(isset($_POST['Site'])) {
			$site->attributes=$_POST['Site'];
			
			$this->performAjaxValidation($site);
			if($site->save()) {
				$err = false;
			} else {
				$err = true;
			}
			echo CJSON::encode(
				array(
						'error'=>$err,
				)
			);
			Yii::app()->end();
			
		}
		
		$mainGallery = new MainGallery();
		
		if(!empty($_FILES['MainGallery']['name']['image'])) {
			$mainGallery->saveImage($_FILES['MainGallery']['tmp_name']['image']);
			$this->redirect("/");
		}
		
		
		
		$this->render('index', array('mainGallery' => $mainGallery, 'site' => $site));
	}
	
	public function actionDeleteMainGallery() {
		if (!empty($_POST['name'])) {
			$mainGallery = new MainGallery();
			$mainGallery->deleteImage($_POST['name']);
		}
	}
	
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
			$this->render('error', $error);
	}
	
	public function actionLogin() {
		
		$this->layout = '//layouts/login';
		$model = new LoginForm();
		
		/**
		 * @var CWebUser $user
		*/
		$user = Yii::app()->user;
		if (!$user->isGuest) {
			$this->redirect(Yii::app()->user->returnUrl);
		}
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
		
			if($model->validate() && $model->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		
		$this->render('login',array(
			'model'=>$model,
		));
		
	}
}