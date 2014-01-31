<?php
/**
 *
 * NewsController class
 *
 */
class NewsController extends EController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function newsMainBlock() {
		$criteria=new CDbCriteria;
		$criteria->limit = 4;
		$criteria->order = "createDate";
		$news = News::model()->find($criteria);
		
		return $this->renderPartial("newsMainBlock", array('news' => $news));
	}
	
	
	
}