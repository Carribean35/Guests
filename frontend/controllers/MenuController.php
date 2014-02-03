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
	
	public function dropdownMenu() {
		$connection = Yii::app()->db;
		$command = $connection->createCommand('SELECT * , 100 * ( IF( pid = 0, id, pid ) ) + id AS srt 	FROM  `menu` ORDER BY srt');
		$rows = $command->queryAll();
	return "!!!";
//		var_dump($rows);
	}
}