<?php
/* @var $this AboutController */
/* @var $model Filial */

$this->title_h3=$header;

$this->breadcrumbs=array(
	'О ресторане',
	'Филиалы' => $this->createUrl('about/filials'),
	$header
);

$tinymcePath = Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/tinymce/'
);

Yii::app()->clientScript->registerScriptFile(
	$tinymcePath."/tinymce.min.js",
	CClientScript::POS_END
);

Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js'
	),
	CClientScript::POS_END
);

if (!empty($model->id)) {
	$this->breadcrumbs_button = '<li class="pull-right no-text-shadow">
								<a class="btn green dash-btn" href="'.$this->createUrl('about/filialGallery', array('id'=>$model->id)).'">Галерея</a>
							</li>';
}

$this->menuActiveItems[BController::ABOUT_FILIAL_MENU_ITEM] = 1;
?>
<div>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>$model->formId,
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>false,
			'errorCssClass'=>'error',
			'afterValidate'=>'js:contentAfterClientValidate',
		),
		'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('about/filials')),

	)); ?>

		<div class="control-group">
			<?php echo $form->label($model,'addressStreet',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($model,'addressStreet',array('class'=>'m-wrap medium')); ?>
				<span class="help-inline"><?php echo $form->error($model,'addressStreet'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'addressHouse',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($model,'addressHouse',array('class'=>'m-wrap small')); ?>
				<span class="help-inline"><?php echo $form->error($model,'addressHouse'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'phone',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($model,'phone',array('class'=>'m-wrap medium')); ?>
				<span class="help-inline"><?php echo $form->error($model,'phone'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'vtour',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($model,'vtour',array('class'=>'m-wrap medium')); ?>
				<span class="help-inline"><?php echo $form->error($model,'vtour'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'smoking',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->checkBox($model,'smoking'); ?>
				<span class="help-inline"><?php echo $form->error($model,'smoking'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'nosmoking',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->checkBox($model,'nosmoking'); ?>
				<span class="help-inline"><?php echo $form->error($model,'nosmoking'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'hall',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->checkBox($model,'hall'); ?>
				<span class="help-inline"><?php echo $form->error($model,'hall'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'wifi',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->checkBox($model,'wifi'); ?>
				<span class="help-inline"><?php echo $form->error($model,'wifi'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'vip',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->checkBox($model,'vip'); ?>
				<span class="help-inline"><?php echo $form->error($model,'vip'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'text',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textArea($model,'text',array('class'=>'m-wrap medium tinymce')); ?>
				<span class="help-inline"><?php echo $form->error($model,'text'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'visible',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->checkBox($model,'visible'); ?>
				<span class="help-inline"><?php echo $form->error($model,'visible'); ?></span>
			</div>
		</div>
		
		<div class="form-actions large">
			<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
			<?php if (!empty($model->id)) : ?>
				<a href="/about/deleteFilial/<?php echo $model->id?>/" onclick="return confirmDelete()"><?php echo CHtml::htmlButton('<i class="icon-remove"></i> Удалить', array('class' => 'btn red', 'type' => 'button')); ?></a>
			<?php endif;?>
			<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
		</div>
		
		<?php echo $form->hiddenField($model,'id'); ?>

	<?php $this->endWidget(); ?>

</div>

<script type="text/javascript">
$(document).ready(function() {

	tinymce.init({
	    selector: "textarea.tinymce"
	});

	$("#Filial_phone").inputmask("mask", {"mask": "(999) 999-99-99"});
	
	
})
</script>