<?php
/**
 *
 * MenuController class
 *
 */
class MenuController extends FController
{
	public function actionIndex($id = false)
	{
		$check = $this->check();
		if (empty($id)) {
			$sectionLeftMenu = $this->sectionLeftMenu();
			$menuMainBlock = $this->menuMainBlock();
			$this->render('sectionList', array('sectionLeftMenu' => $sectionLeftMenu, 'check' => $check, 'menuMainBlock' => $menuMainBlock));
		} else {
			$section = $this->loadModel('Menu', $id);
			
			$sectionLeftMenu = $this->sectionLeftMenu($section);
			
			$criteria=new CDbCriteria;
			$criteria->condition = "visible = 1 AND pid = ".$section->id;
			$dishs = Dish::model()->findAll($criteria);
			
			$this->render('dishList', array('sectionLeftMenu' => $sectionLeftMenu, 'section' => $section, 'dishs' => $dishs, 'check' => $check));
		}
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
	
	public function sectionLeftMenu($section = false) {
		$pid = 0;
		if (!empty($section)) {
			$pid = $section->id;
			if ($section->level == 1)
				$pid = $section->pid;
		}
			
		$connection = Yii::app()->db;
		$command = $connection->createCommand('SELECT * , 100 * ( IF( pid = 0, id, pid ) ) + id AS srt
													FROM  `menu`
													WHERE visible = 1 AND
													(level = 0 OR pid = '.$pid.')
													ORDER BY srt');
		$menuItems = $command->queryAll();
			
		return $this->renderPartial('sectionLeftMenu', array("menuItems" => $menuItems, "section" => $section), true);
	}
	
	public function check() {
		return $this->renderPartial('check', array(), true);
	}
}