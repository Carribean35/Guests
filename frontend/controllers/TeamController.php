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

}