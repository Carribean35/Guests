<?php
/**
 *
 * TeamController class
 *
 */
class TeamController extends RController
{
	public function actionIndex()
	{
		$team = new Team();
		$worker = new Worker();
		$this->render('index', array('team' => $team, 'worker' => $worker));
	}
	
	public function actionGallery() {
		$teamGallery = new TeamGallery();
		$this->render('gallery', array('teamGallery' => $teamGallery));
	}
	
	public function actionGalleryItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать фото';
			$model = $this->loadModel('TeamGallery', $id);
		} else  
		{
			$header = 'Добавить фото команды';
			$model = new TeamGallery();
		}
		
		if(isset($_POST['TeamGallery'])) {
			$model->attributes=$_POST['TeamGallery'];

			if($model->save()) {
				if (!empty($_FILES['TeamGallery']['tmp_name']['image'])) {
					$model->saveImage($_FILES['TeamGallery']['tmp_name']['image']);
				}
				
				$this->redirect($this->createUrl('team/gallery'));
			}
		}
		
		$this->render('galleryItem', array('header' => $header, 'model' => $model));
	}
	
	public function actionWorker() {
		$worker = new Worker();
		$this->render('worker', array('worker' => $worker));
	}
	
	public function actionDeleteGalleryItem($id) {
		$team = $this->loadModel('TeamGallery', $id);
		$team->deleteFull();
		$this->redirect($this->createUrl('team/gallery'));
	}
	
	public function actionWorkerItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать сотрудника';
			$model = $this->loadModel('Worker', $id);
		} else  
		{
			$header = 'Добавить сотрудника';
			$model = new Worker();
		}
		
		if(isset($_POST['Worker'])) {
			$model->attributes=$_POST['Worker'];

			if($model->save()) {
				if (!empty($_FILES['Worker']['tmp_name']['image'])) {
					$model->saveImage($_FILES['Worker']['tmp_name']['image']);
				}
				
				$this->redirect($this->createUrl('team/worker'));
			}
		}
		
		$this->render('workerItem', array('header' => $header, 'model' => $model));
	}
	
	public function actionDeleteWorker($id) {
		$worker = $this->loadModel('Worker', $id);
		$worker->deleteFull();
		$this->redirect($this->createUrl('team/worker'));
	}
	
	public function actionJob()
	{
		$header = 'Вакансии';
		$model = new Job();
	
		if(isset($_POST['Job'])) {
			$model->attributes=$_POST['Job'];
	
			if($model->save()) {
				if (!empty($_FILES['Job']['tmp_name']['image'])) {
					$model->saveImage($_FILES['Job']['tmp_name']['image']);
				}
	
				$this->redirect($this->createUrl('team/job'));
			}
		}
	
		$this->render('job', array('header' => $header, 'model' => $model));
	}
}