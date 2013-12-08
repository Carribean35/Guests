<?php
/* @var $this MenuController */
/* @var $modelMenu Menu*/
/* @var $currentSection Menu*/

$this->title_h3='Меню';

if (!$currentSection || $currentSection->level < 1) {
	$this->breadcrumbs_button .= '<li class="pull-right no-text-shadow">
									<a class="btn blue dash-btn" href="'.$this->createUrl('menu/section', array('pid'=>$modelMenu->pid)).'"><i class="icon-plus"></i>Добавить раздел</a>
								</li>';
}

if ($currentSection !== false) {
	$this->breadcrumbs_button .= '<li class="pull-right no-text-shadow">
								<a class="btn green dash-btn" href="'.$this->createUrl('menu/dish', array('pid'=>$modelMenu->pid)).'"><i class="icon-plus"></i>Добавить блюдо</a>
							</li>';
}

$this->menuActiveItems[BController::MENU_MENU_ITEM] = 1;

?>
<div>
	
	<?php 
	if (!$currentSection || $currentSection->level < 1) {
		?>
		<h4>Разделы</h4>
		<?php
		$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'client-grid',
				'dataProvider'=>$modelMenu->search(),
				'filter'=>null,
				'enableSorting'=>false,
				'htmlOptions'=>array('class'=>'portlet-body'),
				'itemsCssClass'=>'table table-striped table-hover',
				'summaryText'=>'',
				'loadingCssClass'=>'',
				'columns'=>array(
					array(
						'header'=>Yii::t('main','ID'),
						'name'=>'id',
					),
					array(
						'header'=>Yii::t('main','Name'),
						'name'=>'name',
						'type'=>'html',
						'value'=>function($data) {
							return CHtml::link($data['name'], $this->createUrl('menu/index', array('id'=>$data['id'])));
						}
					),
					array(
						'header'=>Yii::t('main','Visible'),
						'name'=>'visible',
						'type'=>'html',
						'value'=>function($data) {
							if ($data['visible'] == 0)
								return CHtml::openTag('span', array('class'=>'label label-important')).'скрытый'.CHtml::closeTag('span');
							else
								return CHtml::openTag('span', array('class'=>'label label-success')).'видимый'.CHtml::closeTag('span');
						}
					),
					array(
						'header'=>Yii::t('main','Actions'),
						'class'=>'CButtonColumn',
						'buttons'=>array(
							'view'=>array(
								'label'=>Yii::t('main','View'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini green-stripe'),
								'url'=>function($data) {
									return $this->createUrl('menu/index', array('id'=>$data['id']));
								},
							),
							'edit'=>array(
								'label'=>Yii::t('main','Edit'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini blue-stripe'),
								'url'=>function($data) {
									return $this->createUrl('menu/section', array('pid'=>$data['pid'], 'id'=>$data['id']));
								},
							),
							'delete'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return $this->createUrl('menu/deleteSection', array('id'=>$data['id']));
								},
							),
						),
						'template'=>'{view} {edit} {delete}',
					),
				),
			)); 
		}
		
		
		
		if ($modelDish !== false) {
			?>
			<h4>Блюда</h4>
			<?php
			$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'client-grid',
					'dataProvider'=>$modelDish->search(),
					'filter'=>null,
					'enableSorting'=>false,
					'htmlOptions'=>array('class'=>'portlet-body'),
					'itemsCssClass'=>'table table-striped table-hover',
					'summaryText'=>'',
					'loadingCssClass'=>'',
					'columns'=>array(
						array(
							'header'=>Yii::t('main','ID'),
							'name'=>'id',
						),
						array(
							'header'=>Yii::t('main','Name'),
							'name'=>'name',
						),
						array(
							'header'=>Yii::t('main','Visible'),
							'name'=>'visible',
							'type'=>'html',
							'value'=>function($data) {
								if ($data['visible'] == 0)
									return CHtml::openTag('span', array('class'=>'label label-important')).'скрытый'.CHtml::closeTag('span');
								else
									return CHtml::openTag('span', array('class'=>'label label-success')).'видимый'.CHtml::closeTag('span');
							}
						),
						array(
							'header'=>Yii::t('main','Actions'),
							'class'=>'CButtonColumn',
							'buttons'=>array(
									'edit'=>array(
											'label'=>Yii::t('main','Edit'),
											'imageUrl'=>false,
											'options'=>array('class'=>'btn mini blue-stripe'),
											'url'=>function($data) {
												return $this->createUrl('menu/dish', array('pid'=>$data['pid'], 'id'=>$data['id']));
											},
									),
									'delete'=>array(
											'label'=>Yii::t('main','Delete'),
											'imageUrl'=>false,
											'options'=>array('class'=>'btn mini red-stripe'),
											'click'=>'confirmDelete',
											'url'=>function($data) {
												return $this->createUrl('menu/deleteDish', array('id'=>$data['id']));
											},
									),
							),
							'template'=>'{edit} {delete}',
						),
					),
			));
		}
		
								?>
</div>