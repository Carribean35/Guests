<?php
/* @var $this SiteController */

$this->title_h3='Бонусы';

$this->breadcrumbs=array(
	'Бонусы'
);

$tinymcePath = Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/tinymce/'
);

Yii::app()->clientScript->registerScriptFile(
	$tinymcePath."/tinymce.min.js",
	CClientScript::POS_END
);

$this->menuActiveItems[BController::BONUS_MENU_ITEM] = 1;

?>

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>$bonus->formId,
			'enableAjaxValidation'=>false,
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>false,
				'errorCssClass'=>'error',
				'afterValidate'=>'js:contentAfterClientValidate',
			),
			'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('/bonus/')),
	
		)); ?>
	
			<div class="control-group">
				<?php echo $form->label($bonus,'text',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->textArea($bonus,'text',array('class'=>'m-wrap tinymce', 'style' => 'height: 400px;')); ?>
					<span class="help-inline"><?php echo $form->error($bonus,'text'); ?></span>
				</div>
			</div>
			<div class="form-actions large">
				<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
				<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
			</div>
		<?php $this->endWidget(); ?>

<script type="text/javascript">
$(document).ready(function() {

	$(document).ready(function() {
		tinymce.init({
		    selector: "textarea.tinymce",
		    content_css : "/css/frontend-style.css"
		 });
	})
	
}) 
</script>