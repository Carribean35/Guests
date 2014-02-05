<?php 
$this->menuActiveItems[FController::TEAM_MENU_ITEM] = 1;

Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js'
	),
	CClientScript::POS_END
);

?>
<div class="left-column-block">
	<div class="left-menu">
		<div class="top-bg"></div>
		<div class="middle-bg">
			<ul>
				<li><a href="/team/">Наша команда</a></li>
				<li><a href="/team/job/">Вакансии</a></li>
				<li class="active"><a>Анкета</a></li>
			</ul>
		</div>
		<div class="bottom-bg"></div>
	</div>
</div>

<div class="anketa-block">
	<div class="h1"><span>Анкета</span></div>
	<div class="anketa-form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>$model->formId,
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>false,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>false,
			'errorCssClass'=>'error',
			'afterValidate'=>'js:afterSubmit',
			'beforeValidate'=>'js:beforeSubmit',
		),
		'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('team/resume/')),

	)); ?>
	<?php echo $form->error($model,'address'); ?>
		<?php echo $form->textField($model,'fio',array('class'=>'input-text input-437 fleft', 'placeholder' => 'Ф.И.О')); ?>
		<?php echo $form->textField($model,'birthDate',array('class'=>'input-text input-208 fright', 'placeholder' => 'ДАТА РОЖДЕНИЯ')); ?>
		
		<?php echo $form->textField($model,'nationality',array('class'=>'input-text input-208 fleft', 'placeholder' => 'ГРАЖДАНСТВО')); ?>
		<?php echo $form->textField($model,'address',array('class'=>'input-text input-437 fright', 'placeholder' => 'ФАКТИЧЕСКИЙ АДРЕС ПРОЖИВАНИЯ')); ?>
	
		<div class="radio-group-text">ВЫБЕРИТЕ РЕСТОРАН, ГДЕ ЖЕЛАЕТЕ РАБОТАТЬ</div>
		<div class="radiobuttons-group">
			<div>
				<input id="f1" type="radio" name="Resume[workPlace]" value="1" checked>
				<label for="f1" class="radio-custom">Софьи Перовской 42</label>
			</div>
			<div>
				<input id="f2" type="radio" name="Resume[workPlace]" value="2">
				<label for="f2" class="radio-custom">Цюрупа 12</label>
			</div>
			<div>
				<input id="f3" type="radio" name="Resume[workPlace]" value="0">
				<label for="f3" class="radio-custom">Могу работать везде</label>
			</div>
		</div>
		<?php echo $form->textField($model,'phone',array('class'=>'input-text input-208 fleft', 'placeholder' => 'УКАЖИТЕ ТЕЛЕФОН ДЛЯ СВЯЗИ')); ?>
		<?php echo $form->textField($model,'lastWork',array('class'=>'input-text input-437 fright', 'placeholder' => 'Предыдущее или настоящее место работы (учёбы)')); ?>
		<div class="radio-group-text">РАБОТУ В РЕСТОРАНАХ НА КАЖДЫЙ ДЕНЬ РАССМАТРИВАЮ КАК:</div>
		<div class="radiobuttons-group">
			<div>
				<input id="tj1" type="radio" name="Resume[workType]" value="0" checked>
				<label for="tj1" class="radio-custom">Основная работа</label>
			</div>
			<div>
				<input id="tj2" type="radio" name="Resume[workType]" value="1">
				<label for="tj2" class="radio-custom">Работа по совместительству</label>
			</div>
			<div>
				<input id="tj3" type="radio" name="Resume[workType]" value="2">
				<label for="tj3" class="radio-custom">Работа в свободное от учёбы время</label>
			</div>
		</div>
		<?php echo $form->textField($model,'wantPost',array('class'=>'input-text input-208 fleft', 'placeholder' => 'ЖЕЛАЕМАЯ ДОЛЖНОСТЬ')); ?>
		<?php echo $form->textField($model,'wantSchedule',array('class'=>'input-text input-437 fright', 'placeholder' => 'ЖЕЛАЕМЫЙ ГРАФИК РАБОТЫ')); ?>
		<div class="confirm">
			<input type="checkbox" id="confirm" name="Resume[confirm]">
			<label for="confirm" class="checkbox-custom">Я согласен с тем, что мои персональные данные будут использоваться компанией "Рестораны на каждый день "ГОСТИ" для решения вопроса о моем трудоустройстве.</label>
		</div>
		<?php echo CHtml::htmlButton('', array('class' => 'submit-button', 'type' => 'submit')); ?>
		<div class="h2"><span>Не теряй время!</span></div>
		<div class="h3"><span>Заполни анкету прямо сейчас!</span></div>
		<?php $this->endWidget(); ?>
	</div>
	<div class="clear"></div>
</div>
<div class="wave-biege"></div>
<script type="text/javascript">
	var beforeSubmit = function(data) {

		if (data.find("#Resume_fio").val() == "") {
			alert("Необходимо указать ФИО!");
			return false;
		}

		if (data.find("#Resume_birthDate").val() == "") {
			alert("Необходимо указать дату рождения!");
			return false;
		}

		if (data.find("#Resume_nationality").val() == "") {
			alert("Необходимо указать гражданство!");
			return false;
		}

		if (data.find("#Resume_address").val() == "") {
			alert("Необходимо указать адресс!");
			return false;
		}

		if (data.find("#Resume_phone").val() == "") {
			alert("Необходимо указать телефон для связи!");
			return false;
		}

		if (data.find("#confirm:checked").length == 0) {
			alert("Необходимо поддтвердить возможность использования ваших данных!");
			return false;
		}

		return true;
	}

	var afterSubmit = function(data) {
		$("#resume-form")[0].reset();
		alert("Ваша анкета принята!");
	}

	$(document).ready(function() {
		$("#Resume_birthDate").inputmask("d.m.y");
		$("#Resume_phone").inputmask("mask", {"mask": "\8 (999) 999 99 99"});

	})
</script>