<?php
/**
 *
 * MenuController class
 *
 */
class MenuController extends FController
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function menuMainBlock() {
		$criteria=new CDbCriteria;
		$criteria->order = "id ASC";
		$criteria->condition = "visible = 1 AND level = 0";
		$sections = Menu::model()->findAll($criteria);
		
		return $this->renderPartial("menuMainBlock", array('sections' => $sections), true);
	}
}