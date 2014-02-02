<?php
/**
 *
 * NewsController class
 *
 */
class NewsController extends FController
{
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->order = "createDate DESC";
		$criteria->condition = "visible = 1 AND createDate <= NOW()";
		$news = News::model()->findAll($criteria);

		$this->render('index', array('news' => $news));
	}

	public function newsMainBlock() {
		$criteria=new CDbCriteria;
		$criteria->limit = 4;
		$criteria->order = "createDate DESC";
		$criteria->condition = "visible = 1 AND createDate <= NOW()";
		$news = News::model()->findAll($criteria);
		if (empty($news))
			return '';
		return $this->renderPartial("newsMainBlock", array('news' => $news), true);
	}
	
	
	
}