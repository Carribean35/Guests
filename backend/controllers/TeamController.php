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
	
	public function actionFoto($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать фото';
			$model = $this->loadModel('Team', $id);
		} else  
		{
			$header = 'Добавить фото команды';
			$model = new Team();
		}
		
		if(isset($_POST['Team'])) {
			$model->attributes=$_POST['Team'];

			if($model->save()) {
				if (!empty($_FILES['Team']['tmp_name']['image'])) {
					Yii::app()->ih
					->load($_FILES['Team']['tmp_name']['image'])
					->resize(200,140)
					->save($model->imagesPath.$model->id);
				} else if (!$model->existImage()){
					$model->visible = 0;
					$model->save();
				}
				
				$this->redirect($this->createUrl('team/index'));
			}
		}
		
		$this->render('foto', array('header' => $header, 'model' => $model));
	}
	
	public function actionDeleteFoto($id) {
		$team = $this->loadModel('Team', $id);
		$team->deleteFull();
		$this->redirect($this->createUrl('team/index'));
	}
	
	public function actionWorker($id = false) 
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
					Yii::app()->ih
					->load($_FILES['Worker']['tmp_name']['image'])
					->resize(200,140)
					->save($model->imagesPath.$model->id);
				} else if (!$model->existImage()){
					$model->visible = 0;
					$model->save();
				}
				
				$this->redirect($this->createUrl('team/index'));
			}
		}
		
		$this->render('worker', array('header' => $header, 'model' => $model));
	}
	
	public function actionDeleteWorker($id) {
		$worker = $this->loadModel('Worker', $id);
		$worker->deleteFull();
		$this->redirect($this->createUrl('team/index'));
	}
}