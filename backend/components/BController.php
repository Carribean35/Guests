<?php
/**
 * BController class
 */
class BController extends EController
{
	const DESKTOP_MENU_ITEM = "desktop";
	const ACCESS_MENU_ITEM = "access";
	const MENU_MENU_ITEM = "menu";
	const ACTION_MENU_ITEM = "action";
	const NEWS_MENU_ITEM = "news";
	const PAGES_MENU_ITEM = "pages";
	const TEAM_MENU_ITEM = "team";
	
	public $breadcrumbs;
	public $breadcrumbs_button;
	public $menuActiveItems = array();
	public $title_h3;

}