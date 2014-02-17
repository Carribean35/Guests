<?php
/**
 *
 * TeamController class
 *
 */
class TeamController extends FController
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->order = "id ASC";
		$criteria->condition = "visible = 1";
		$teamGallery = TeamGallery::model()->findAll($criteria);
		
		$criteria = new CDbCriteria;
		$criteria->order = "RAND()";
		$criteria->limit = 3;
		$criteria->condition = "visible = 1";
		$workers = Worker::model()->findAll($criteria);
		
		$this->render('index', array('teamGallery' => $teamGallery, 'workers' => $workers));
	}
	
	public function actionJob() {
		$model = new Job();
		$this->render('job', array('model' => $model));
	}
	
	public function actionResume() {
		$model = new Resume();
		
		if(isset($_POST['Resume'])) {
			$model->attributes=$_POST['Resume'];
			
			$mailBlank = $this->renderPartial("//mailBlank/resume", array("model" => $model), true);
			$site = new Site();
			SendMail::send($site->emailResume, "Резюме", $mailBlank);
			
			$timestamp = CDateTimeParser::parse($model->birthDate,'dd.MM.yyyy');
			$model->birthDate = date("Y-m-d", $timestamp);
			
			$model->save();
			
			
			
			
			echo CJSON::encode(
				array(
					'error'=>false,
				)
			);
			Yii::app()->end();
		}
		
		$this->render('resume', array('model' => $model));
	}

}