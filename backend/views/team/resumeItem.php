<?php
/* @var $this TeamController */
/* @var $model Team */

$this->title_h3='Просмотр анкеты';

$this->breadcrumbs=array(
	'Наша команда',
	'Анкеты' => $this->createUrl('team/resume'),
	'Просмотр анкеты'
);

$this->menuActiveItems[BController::TEAM_MENU_RESUME] = 1;

?>
<div>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>$model->formId,
		'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('team/resumeItem')),

	)); ?>
	
		<div class="control-group">
			<?php echo $form->label($model,'fio',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
					<?php echo $model->fio;?>
				</p>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'birthDate',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
				<?php echo $model->birthDate?>
				</p>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'nationality',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
				<?php echo $model->nationality?>
				</p>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'address',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
				<?php echo $model->address?>
				</p>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'workPlace',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
					<?php echo $model->workPlaces[$model->workPlace];?>
				</p>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'phone',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
				<?php echo $model->phone?>
				</p>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'lastWork',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
				<?php echo $model->lastWork?>
				</p>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'workType',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
					<?php echo $model->workTypes[$model->workType];?>
				</p>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'wantPost',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
				<?php echo $model->wantPost?>
				</p>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'wantSchedule',array('class'=>'control-label')); ?>
			<div class="controls">
				<p class="form-control-static">
				<?php echo $model->wantSchedule?>
				</p>
			</div>
		</div>
		
				
		<div class="form-actions large">
			<?php if (!empty($model->id)) : ?>
				<a href="/team/deleteResume/<?php echo $model->id?>/" onclick="return confirmDelete()"><?php echo CHtml::htmlButton('<i class="icon-remove"></i> Удалить', array('class' => 'btn red', 'type' => 'button')); ?></a>
			<?php endif;?>
		</div>

	<?php $this->endWidget(); ?>

</div>