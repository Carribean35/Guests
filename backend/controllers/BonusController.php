<?php
/**
 *
 * BonusController class
 *
 */
class BonusController extends RController
{
	public function actionIndex()
	{
		$bonus = new Bonus();
		
		if(isset($_POST['Bonus'])) {
			$bonus->attributes=$_POST['Bonus'];
		
			if($bonus->save()) {
				$this->redirect($this->createUrl('/bonus/'));
			}
		}
		
		$this->render('index', array('bonus' => $bonus));
	}
	
}