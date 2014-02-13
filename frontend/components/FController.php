<?php
/**
 * FController class
 */
class FController extends EController
{
	const NEWS_MENU_ITEM = "news";
	const ACTION_MENU_ITEM = "action";
	const TEAM_MENU_ITEM = "team";
	const ABOUT_MENU_ITEM = "about";
	const MENU_MENU_ITEM = "menu";
	const DELIVERY_MENU_ITEM = "delivery";
	const BONUS_MENU_ITEM = "bonus";
	const PARTNER_MENU_ITEM = "partner";
	const REVIEW_MENU_ITEM = "review";
	
	protected $dropdownMenu;
	
	public $menuActiveItems = array();
	
	public $site;
	
	protected function beforeAction($action)
	{
		if (parent::beforeAction($action)) {
			list($menuController) = Yii::app()->createController('menu');
			$this->dropdownMenu = $menuController->dropdownMenu();
			
			$this->site = new Site();
			
			return true;
	    }
		return false;
	}

}