<?php
/* @var $this AboutController */
/* @var $model Filial*/

$this->title_h3='Филиалы';

$this->breadcrumbs=array(
	'О ресторане',
	'Филиалы'
);

$this->breadcrumbs_button = '<li class="pull-right no-text-shadow">
								<a class="btn blue dash-btn" href="'.$this->createUrl('about/filialItem').'"><i class="icon-plus"></i>Добавить запись</a>
							</li>';

$this->menuActiveItems[BController::ABOUT_FILIAL_MENU_ITEM] = 1;
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
						'header'=>Yii::t('main','Address'),
						'name'=>'addressStreet',
						'value'=>function($data) {
							return $data['addressStreet'].", ".$data['addressHouse'];						
						}
					),
					array(
						'header'=>Yii::t('main','Phone'),
						'name'=>'phone',
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
									return '/about/filialItem/'.$data['id'].'/';
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return '/about/filialDelete/'.$data['id'].'/';
								},
							),
							'gallery'=>array(
									'label'=>Yii::t('main','Gallery'),
									'imageUrl'=>false,
									'options'=>array('class'=>'btn mini green-stripe'),
									'url'=>function($data) {
										return '/about/filialGallery/'.$data['id'].'/';
									},
							),
						),
						'template'=>'{view} {add} {gallery}',
					),
				),
			)); ?>
</div>