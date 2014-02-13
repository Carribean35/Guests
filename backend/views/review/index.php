<?php
/* @var $this ReviewController */
/* @var $model Review*/

$this->title_h3='Отзывы';

$this->breadcrumbs=array(
	'Отзывы'
);


$this->menuActiveItems[BController::REVIEW_MENU_ITEM] = 1;
?>
<div>
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'client-grid',
				'dataProvider'=>$model->search(),
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
						'header'=>Yii::t('main','FName'),
						'name'=>'name',
					),
					array(
							'header'=>Yii::t('main','Phone'),
							'name'=>'phone',
					),
					array(
							'header'=>Yii::t('main','Email'),
							'name'=>'email',
					),
					array(
							'header'=>Yii::t('main','Type'),
							'value'=>function($data) {
								if ($data['type'] == 1)
									$img = "good";
								if ($data['type'] == 2)
									$img = "bad";
								if ($data['type'] == 3)
									$img = "offer";

								return '<img src="/img/icon-'.$img.'.png">';
							},
							'type' => 'html'
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
								'label'=>Yii::t('main','Edit'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini blue-stripe'),
								'url'=>function($data) {
									return '/review/item/'.$data['id'].'/';
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return '/review/delete/'.$data['id'].'/';
								},
							),
						),
						'template'=>'{view} {add}',
					),
				),
			)); ?>
</div>