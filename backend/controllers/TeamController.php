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
					if (!file_exists($model->imagesPath.'original/'))
						mkdir($model->imagesPath.'original/');
					if (!file_exists($model->imagesPath.'admin_preview/'))
						mkdir($model->imagesPath.'admin_preview/');
						
					$ih = Yii::app()->ih
					->load($_FILES['TeamGallery']['tmp_name']['image'])
					->save($model->imagesPath.'original/'.$model->id)
					->adaptiveThumb(200,150)
					->save($model->imagesPath.'admin_preview/'.$model->id);
						
					$sizes = $model->getImageSizes();
						
					foreach ($sizes AS $key => $val) {
						if (!file_exists($model->imagesPath.$val[0].'x'.$val[1].'/'))
							mkdir($model->imagesPath.$val[0].'x'.$val[1].'/');
						$ih->reload()
						->adaptiveThumb($val[0], $val[1])
						->save($model->imagesPath.$val[0].'x'.$val[1].'/'.$model->id);
					}
				} else if (!$model->existImage()){
					$model->visible = 0;
					$model->save();
				}
				
				$this->redirect($this->createUrl('team/gallery'));
			}
		}
		
		$this->render('galleryItem', array('header' => $header, 'model' => $model));
	}
	
	public function actionDeleteGalleryItem($id) {
		$team = $this->loadModel('TeamGallery', $id);
		$team->deleteFull();
		$this->redirect($this->createUrl('team/gallery'));
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