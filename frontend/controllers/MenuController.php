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
			$sections = array($section->id);
			if ($section->level == 0) {
				$connection = Yii::app()->db;
				$sql = "SELECT GROUP_CONCAT(id SEPARATOR ',') as ids FROM menu WHERE pid = ".$section->id;
				$command = $connection->createCommand($sql);
				$rows = $command->queryRow();
				if (!empty($rows['ids']))
					$sections[] = $rows['ids'];
			}
				
			
			$criteria=new CDbCriteria;
			$criteria->condition = "visible = 1 AND pid IN (".implode(",", $sections).")";
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
	
	public function actionSubmitOrder() {
		
		if (!empty($_POST['Order'])) {
			$order = $_POST['Order'];
			$order['dishes'] = json_decode($order['dishes']);

			$mailBlank = $this->renderPartial("//mailBlank/order", array("order" => $order), true);
			
			$site = new Site();
			
			SendMail::send($site->emailOrder, "Заявка", $mailBlank);

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
	
	public function recommendedBlock() {
		$criteria=new CDbCriteria;
		$criteria->order = "RAND()";
		$criteria->condition = "visible = 1 AND recommended = 1";
		$criteria->limit = 3;
		$dish = Dish::model()->findAll($criteria);
	
		if ($dish)
			return $this->renderPartial("recommendedBlock", array('dish' => $dish), true);
		return '';
	}
}