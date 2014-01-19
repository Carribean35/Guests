<?php
/**
 *
 * ActionController class
 *
 */
class ActionController extends RController
{
	public function actionIndex()
	{
		$model = new Action();
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать акцию';
			$model = $this->loadModel('Action', $id);
		} else  
		{
			$header = 'Добавить акцию';
			$model = new Action();
		}
		
		if(isset($_POST['Action'])) {
			$model->attributes=$_POST['Action'];

			if($model->save()) {
				if (!empty($_FILES['Action']['tmp_name']['image'])) {
					Yii::app()->ih
					->load($_FILES['Action']['tmp_name']['image'])
					->resize(200,140)
					->save($model->imagesPath.$model->id);
				} else if (!$model->existImage()){
					$model->visible = 0;
					$model->save();
				}
				
				$this->redirect($this->createUrl('action/index'));
			}
		}
		
		$this->render('item', array('header' => $header, 'model' => $model));
	}
	
	public function actionDelete($id) {
		$action = $this->loadModel('Action', $id);
		$action->deleteFull();
		$this->redirect($this->createUrl('action/index'));
	}
}