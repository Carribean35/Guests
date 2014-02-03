<?php
/* @var $worker Worker*/

$this->title_h3='Наша команда';

$this->breadcrumbs=array(
	'Наша команда',
	'Анкеты'
);

$this->menuActiveItems[BController::TEAM_MENU_RESUME] = 1;
?>
<div>
	
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'client-grid',
				'dataProvider'=>$resume->search(),
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
						'header'=>Yii::t('main','FIO'),
						'name'=>'fio',
					),
					array(
						'header'=>Yii::t('main','Birth Date'),
						'name'=>'birthDate',
						'value'=>function($data) {
							$timestamp = CDateTimeParser::parse($data->birthDate,'yyyy-MM-dd');
							return date("d.m.Y", $timestamp);							
						}
					),
					array(
						'header'=>Yii::t('main','Phone'),
						'name'=>'phone',
					),
					array(
						'header'=>Yii::t('main','Actions'),
						'class'=>'CButtonColumn',
						'buttons'=>array(
							'view'=>array(
								'label'=>Yii::t('main','Show'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini blue-stripe'),
								'url'=>function($data) {
									return $this->createUrl('team/resumeItem', array('id'=>$data['id']));
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return $this->createUrl('team/deleteResume', array('id'=>$data['id']));
								},
							),
						),
						'template'=>'{view} {add}',
					),
				),
			)); ?>
</div>