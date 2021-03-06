<?php
/* @var $this TeamController */
/* @var $team Team*/
/* @var $worker Worker*/

$this->title_h3='Наша команда';

$this->breadcrumbs=array(
	'Наша команда'
);

$this->breadcrumbs_button = '<li class="pull-right no-text-shadow">
								<a class="btn blue dash-btn" href="'.$this->createUrl('team/foto').'"><i class="icon-plus"></i>Добавить фото</a>
								<a class="btn green dash-btn" href="'.$this->createUrl('team/worker').'"><i class="icon-plus"></i>Добавить сотрудника</a>
							</li>';

$this->menuActiveItems[BController::TEAM_MENU_ITEM] = 1;
?>
<div>
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'client-grid',
				'dataProvider'=>$team->search(),
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
						'header'=>Yii::t('main','Image'),
						'name'=>'id',
						'type'=>'html',
						'value'=>function($data) {
							return CHtml::image($data->getImagesUrl().$data->id, false, array('class'=>'listImg'));
						}
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
							'view'=>array(
								'label'=>Yii::t('main','Edit'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini blue-stripe'),
								'url'=>function($data) {
									return '/team/foto/'.$data['id'].'/';
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return '/team/deleteFoto/'.$data['id'].'/';
								},
							),
						),
						'template'=>'{view} {add}',
					),
				),
			)); ?>
			
			
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'client-grid',
				'dataProvider'=>$worker->search(),
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
						'header'=>Yii::t('main','Image'),
						'name'=>'id',
						'type'=>'html',
						'value'=>function($data) {
							return CHtml::image($data->getImagesUrl().$data->id, false, array('class'=>'listImg'));
						}
					),
					array(
						'header'=>Yii::t('main','FName'),
						'name'=>'name',
					),
					array(
						'header'=>Yii::t('main','Post'),
						'name'=>'post',
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
									return '/team/worker/'.$data['id'].'/';
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return '/team/deleteWorker/'.$data['id'].'/';
								},
							),
						),
						'template'=>'{view} {add}',
					),
				),
			)); ?>
</div>