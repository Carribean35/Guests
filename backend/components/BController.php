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
	const TEAM_MENU_GALLERY = "team_gallery";
	const TEAM_MENU_WORKER = "team_worker";
	const TEAM_MENU_JOB = "team_job";
	const TEAM_MENU_RESUME = "team_resume";
	const ABOUT_RESTAURANT_MENU_ITEM = "about";
	const ABOUT_FILIAL_MENU_ITEM = "about_filial";
	const REVIEW_MENU_ITEM = "review";
	const BONUS_MENU_ITEM = "bonus";
	const PARTNER_MENU_ITEM = "partner";
	
	
	public $breadcrumbs;
	public $breadcrumbs_button;
	public $menuActiveItems = array();
	public $title_h3;

}