<?php
/**
 * FController class
 */
class FController extends EController
{
	const NEWS_MENU_ITEM = "news";
	const ACTION_MENU_ITEM = "action";
	const TEAM_MENU_ITEM = "team";
	
	protected $dropdownMenu;
	
	public $menuActiveItems = array();
	
	protected function beforeAction($action)
	{
		if (parent::beforeAction($action)) {
			list($menuController) = Yii::app()->createController('menu');
			$this->dropdownMenu = $menuController->dropdownMenu();
			return true;
	    }
		return false;
	}

}