<?php
/**
 *
 * SearchController class
 *
 */
class SearchController extends FController
{
	
	public function actionIndex()
	{
		$q = '';
		if (!empty($_GET['q']))
			$q = trim($_GET['q']);
		
		list($menuController) = Yii::app()->createController('menu');
		
		$check = $menuController->check();
		$sectionLeftMenu = $menuController->sectionLeftMenu();
		
		$criteria=new CDbCriteria;
		$criteria->condition = "visible = 1 AND (name LIKE :q OR text LIKE :q)";
		$criteria->params = array(':q' => '%'.$q.'%');
		$dishs = Dish::model()->findAll($criteria);
		
		$this->render('dishList', array('sectionLeftMenu' => $sectionLeftMenu, 'dishs' => $dishs, 'check' => $check));
	}
}