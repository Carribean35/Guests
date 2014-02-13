<?php
/**
 *
 * PartnerController class
 *
 */
class PartnerController extends RController
{
	public function actionIndex()
	{
		$partner = new Partner();
		
		if(isset($_POST['Partner'])) {
			$partner->attributes=$_POST['Partner'];
		
			if($partner->save()) {
				$this->redirect($this->createUrl('/partner/'));
			}
		}
		
		$this->render('index', array('partner' => $partner));
	}
	
}