<?php
/**
 *
 * ReviewController class
 *
 */
class ReviewController extends RController
{
	public function actionIndex()
	{
		$model = new Review();
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать отзыв';
			$model = $this->loadModel('Review', $id);
		} else  
		{
			$header = 'Добавить отзыв';
			$model = new Review();
		}
		
		if(isset($_POST['Review'])) {
			$model->attributes=$_POST['Review'];

			if($model->save()) {
				$this->redirect($this->createUrl('review/index'));
			}
		}
		
		$this->render('item', array('header' => $header, 'model' => $model));
	}
	
	public function actionDelete($id) {
		Review::model()->deleteByPk($id);
		$this->redirect($this->createUrl('review/index'));
	}
}