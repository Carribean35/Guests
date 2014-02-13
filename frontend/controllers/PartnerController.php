<?php
/**
 *
 * PartnerController class
 *
 */
class PartnerController extends FController
{
	public function actionIndex()
	{
		$partner = new Partner();
		$this->render('index', array('partner' => $partner));
	}

}