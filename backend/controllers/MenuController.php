<?php
/**
 *
 * MenuController class
 *
 */
class MenuController extends RController
{
	public function actionIndex($id = 0)
	{
		$modelMenu = new Menu();
		$modelDish = false;
		$currentSection = false;
		$modelMenu->pid = $id;
		if (!empty($id)) 
		{
			$currentSection = $this->loadModel('Menu', $id);
			$this->breadcrumbs = $this->buildBreadkrumbsCatalog($currentSection);
			$modelDish = new Dish();
			$modelDish->pid = $id;
		} else {
			$this->breadcrumbs[] = 'Меню';
		}
		
		$this->render('index', array('modelMenu' => $modelMenu, 'currentSection' => $currentSection, 'modelDish' => $modelDish));
	}
	
	public function actionSection($pid = 0, $id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать раздел';
			$model = $this->loadModel('Menu', $id);
		}
		else
		{
			$header = 'Добавить раздел';
			$model = new Menu();
		}
		
		if(isset($_POST['Menu'])) {
			$model->attributes=$_POST['Menu'];
			
			$model->pid = $pid;
			
			if (!empty($pid)) {
				$parentMenu = $this->loadModel('Menu', $pid);
				$model->level = $parentMenu->level + 1; 
			}
			
			if($model->save()) {
				if (!empty($_FILES['Menu']['tmp_name']['image'])) {
					if (!file_exists($model->imagesPath.'original/'))
						mkdir($model->imagesPath.'original/');
					if (!file_exists($model->imagesPath.'admin_preview/'))
						mkdir($model->imagesPath.'admin_preview/');
					
					$ih = Yii::app()->ih
					->load($_FILES['Menu']['tmp_name']['image'])
					->save($model->imagesPath.'original/'.$model->id)
					->adaptiveThumb(200,150)
					->save($model->imagesPath.'admin_preview/'.$model->id);
					
					$sizes = $model->getImageSizes();
					
					foreach ($sizes AS $key => $val) {
						if (!file_exists($model->imagesPath.$val[0].'x'.$val[1].'/'))
							mkdir($model->imagesPath.$val[0].'x'.$val[1].'/');
						$ih->reload()
						->adaptiveThumb($val[0], $val[1])
						->save($model->imagesPath.$val[0].'x'.$val[1].'/'.$model->id);
					}
				}
				
				$this->redirect($this->createUrl('menu/index', array('id' => $pid)));
			}
		}
		
		if (!empty($pid)) {
			$currentSection = $this->loadModel('Menu', $pid);
			$this->breadcrumbs = $this->buildBreadkrumbsCatalog($currentSection, true);
			$this->breadcrumbs[] = $header;
		} else {
			$this->breadcrumbs=array(
				'Меню' => $this->createUrl('menu/index'),
				$header
			);
		}
		
		$this->render('section', array('header' => $header, 'model' => $model));
	}
	
	private function buildBreadkrumbsCatalog($parentSection, $lastLink = false) {
		if ($lastLink)
			$breadcrumbs[$parentSection->name] = $this->createUrl('menu/index', array('id'=>$parentSection->id));
		else 
			$breadcrumbs[] = $parentSection->name;
		
		while(true)
		{
			if (empty($parentSection->pid))
			{
				break;
			}
			$parentSection = $this->loadModel('Menu', $parentSection->pid);
			$breadcrumbs[$parentSection->name] = $this->createUrl('menu/index', array('id'=>$parentSection->id));
		}
		$breadcrumbs['Меню'] = $this->createUrl('menu/index');
		$breadcrumbs = array_reverse($breadcrumbs);
		return $breadcrumbs;
	}

	public function actionDish($pid, $id = false) {
		if ($id !== false) 
		{
			$header = 'Редактировать блюдо';
			$model = $this->loadModel('Dish', $id);
		}
		else
		{
			$header = 'Добавить блюдо';
			$model = new Dish();
		}
		$model->pid = $pid;
		
		if(isset($_POST['Dish'])) {
			$model->attributes=$_POST['Dish'];
			
			if($model->save()) {
				if (!file_exists($model->imagesPath.'original/'))
					mkdir($model->imagesPath.'original/');
				if (!file_exists($model->imagesPath.'admin_preview/'))
					mkdir($model->imagesPath.'admin_preview/');
				
				if (!empty($_FILES['Dish']['tmp_name']['image'])) {
					$ih = Yii::app()->ih
					->load($_FILES['Dish']['tmp_name']['image'])
					->save($model->imagesPath.'original/'.$model->id)
					->adaptiveThumb(200,150)
					->save($model->imagesPath.'admin_preview/'.$model->id);
					
					$sizes = $model->getImageSizes();
						
					foreach ($sizes AS $key => $val) {
						if (!file_exists($model->imagesPath.$val[0].'x'.$val[1].'/'))
							mkdir($model->imagesPath.$val[0].'x'.$val[1].'/');
						$ih->reload()
						->adaptiveThumb($val[0], $val[1])
						->save($model->imagesPath.$val[0].'x'.$val[1].'/'.$model->id);
					}
					
				}
				
				$this->redirect($this->createUrl('menu/index', array('id' => $pid)));
			}
		}
		

		$currentSection = $this->loadModel('Menu', $pid);
		$this->breadcrumbs = $this->buildBreadkrumbsCatalog($currentSection, true);
		$this->breadcrumbs[] = $header;
		
		$this->render('dish', array('header' => $header, 'model' => $model));
	}
	
	public function actionDeleteDish($id) {
		$dish = $this->loadModel('Dish', $id);
		$pid = $dish->pid;
		$dish->deleteDish();
		$this->redirect($this->createUrl('menu/index', array('id' => $pid)));
	}
	
	public function actionDeleteSection($id) {
		$section = $this->loadModel('Menu', $id);
		$pid = $section->pid;
		$section->recurciveDelete();
		$this->redirect($this->createUrl('menu/index', array('id' => $pid)));
	}
}