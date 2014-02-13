<?php
/**
 *
 * BonusController class
 *
 */
class BonusController extends FController
{
	public function actionIndex()
	{
		$bonus = new Bonus();
		$this->render('index', array('bonus' => $bonus));
	}

}