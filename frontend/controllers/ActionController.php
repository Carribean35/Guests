<?php
/**
 *
 * ActionController class
 *
 */
class ActionController extends FController
{
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->order = "id ASC";
		$criteria->condition = "visible = 1";
		$actions = Action::model()->findAll($criteria);

		$this->render('index', array('actions' => $actions));
	}

}