<?php
/**
 * BController class
 */
class BController extends EController
{
	const DESKTOP_MENU_ITEM = "desktop";
	const ACCESS_MENU_ITEM = "access";
	const MENU_MENU_ITEM = "menu";
	
	public $breadcrumbs;
	public $breadcrumbs_button;
	public $menuActiveItems = array();
	public $title_h3;

}