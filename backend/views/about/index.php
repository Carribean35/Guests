<?php
/* @var $this AboutController */
/* @var $model About */

$this->title_h3='О ресторане';

$this->breadcrumbs=array(
	'О ресторане'
);

$this->menuActiveItems[BController::ABOUT_RESTAURANT_MENU_ITEM] = 1;

$tinymcePath = Yii::app()->assetManager->publish(
	Yii::getPathOfAlias('webroot').'/plugins/tinymce/'
);

Yii::app()->clientScript->registerScriptFile(
	$tinymcePath."/tinymce.min.js",
	CClientScript::POS_END
);

$this->breadcrumbs_button = '<li class="pull-right no-text-shadow">
								<a class="btn blue dash-btn" href="'.$this->createUrl('about/filials').'">Филиалы</a>
							</li>';

?>
<div>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>$model->formId,
		'enableAjaxValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>false,
			'errorCssClass'=>'error',
			'afterValidate'=>'js:afterValidate',
		),
		'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('about')),

	)); ?>
	
		<div class="control-group">
			<?php echo $form->label($model,'text',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textArea($model,'text',array('class'=>'m-wrap medium tinymce')); ?>
				<span class="help-inline"><?php echo $form->error($model,'text'); ?></span>
			</div>
		</div>
		
		<div class="form-actions large">
			<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
			<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
		</div>
		

	<?php $this->endWidget(); ?>

</div>

<script type="text/javascript">
$(document).ready(function() {

	$(document).ready(function() {
		tinymce.init({
		    selector: "textarea.tinymce"
		 });
	})
	
}) 

var afterValidate = function() {
	alert("Сохранено");
}
</script>