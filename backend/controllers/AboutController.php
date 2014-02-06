<?php
/**
 *
 * AboutController class
 *
 */
class AboutController extends RController
{
	public function actionIndex()
	{
		$model = new About();
		
		if(isset($_POST['About'])) {
			$model->attributes=$_POST['About'];
			
			if($model->save()) {
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
		
		$this->render('index', array('model' => $model));
	}
	
	public function actionFilials() {
		$model = new Filial();
		$this->render('filial', array('model' => $model));
	}
	
	public function actionFilialItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать филиал';
			$model = $this->loadModel('Filial', $id);
		} else  
		{
			$header = 'Добавить филиал';
			$model = new Filial();
		}
		
		if(isset($_POST['Filial'])) {
			$model->attributes=$_POST['Filial'];
			
			$model->save();
			$this->redirect($this->createUrl('about/filials'));
		}
		
		$this->render('filialItem', array('header' => $header, 'model' => $model));
	}
	
	public function actionDeletePhotoFilialGallery() {
		if (!empty($_POST['name']) && !empty($_POST['id'])) {
			$filialGallery = new FilialGallery($_POST['id']);
			$filialGallery->deleteImage($_POST['name']);
		}
	}
	
	public function actionFilialGallery($id)
	{
		$filialGallery = new FilialGallery($id);
		$filial = $this->loadModel('Filial', $id);
	
		if(!empty($_FILES['FilialGallery']['name']['image'])) {
			$filialGallery->saveImage($_FILES['FilialGallery']['tmp_name']['image']);
			$this->redirect("/about/filialGallery/".$id."/");
		}
	
		$this->render('filialGallery', array('filial' => $filial, 'filialGallery' => $filialGallery));
	}
	
	public function actionFilialDelete($id) {
		Filial::model()->deleteByPk($id);
		$filialGallery = new FilialGallery($id);
		$filialGallery->deleteGallery();
		$this->redirect($this->createUrl('about/filials'));
	}
}