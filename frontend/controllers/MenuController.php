<?php
/**
 *
 * MenuController class
 *
 */
class MenuController extends FController
{
	public function actionIndex($id)
	{
		
		$section = $this->loadModel('Menu', $id);
		$pid = $id;
		if ($section->level == 1)
			$pid = $section->pid; 
		
		
		$connection = Yii::app()->db;
		$command = $connection->createCommand('SELECT * , 100 * ( IF( pid = 0, id, pid ) ) + id AS srt 	
												FROM  `menu` 
												WHERE visible = 1 AND
												(level = 0 OR pid = '.$pid.') 
												ORDER BY srt');
		$menuItems = $command->queryAll();
		
		$criteria=new CDbCriteria;
		$criteria->condition = "visible = 1 AND pid = ".$section->id;
		$dishs = Dish::model()->findAll($criteria);
		
		$this->render('index', array('menuItems' => $menuItems, 'section' => $section, 'dishs' => $dishs));
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
		$command = $connection->createCommand('SELECT * , 100 * ( IF( pid = 0, id, pid ) ) + id AS srt 	FROM  `menu` WHERE visible = 1 ORDER BY srt');
		$rows = $command->queryAll();
		
		return $this->renderPartial('dropdownMenu', array("rows" => $rows), true);
	}
}