<?php
/**
 *
 * ReviewController class
 *
 */
class ReviewController extends FController
{
	public function actionIndex(){
		$criteria=new CDbCriteria;
// 		$criteria->order = "createDate DESC";
		$criteria->condition = "visible = 1 ";
		$reviews = Review::model()->findAll($criteria);
		
		$this->render('index', array('reviews' => $reviews));
	}
	
	public function actionGood() {
		$mainGallery = new MainGallery();
		
		list($newsController) = Yii::app()->createController('news');
		$newsMainBlock = $newsController->newsMainBlock();
		
		$this->render('good', array('newsMainBlock' => $newsMainBlock, 'mainGallery' => $mainGallery));
	}
	
	public function actionBad() {
		$mainGallery = new MainGallery();
		
		list($newsController) = Yii::app()->createController('news');
		$newsMainBlock = $newsController->newsMainBlock();
		
		$this->render('bad', array('newsMainBlock' => $newsMainBlock, 'mainGallery' => $mainGallery));
	}

	public function actionNotice() {
		$mainGallery = new MainGallery();
		
		list($newsController) = Yii::app()->createController('news');
		$newsMainBlock = $newsController->newsMainBlock();
		
		$this->render('notice', array('newsMainBlock' => $newsMainBlock, 'mainGallery' => $mainGallery));
	}
	
	public function actionSubmit() {
		if (!empty($_POST)) {
			$review = new Review();
			$review->name = $_POST['name'];
			$review->phone = $_POST['phone'];
			$review->email = $_POST['email'];
			$review->text = $_POST['text'];
			$review->type = $_POST['type'];
			$review->date = date('Y-m-d H:i:s');

			$review->save();
		
			$site = new Site();
				
		}
		
		echo CJSON::encode(
				array(
						'error'=>false,
				)
		);
		Yii::app()->end();
	}
	
}