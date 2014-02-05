<?php 
$this->menuActiveItems[FController::TEAM_MENU_ITEM] = 1;
?>
<div class="left-column-block">
	<div class="left-menu">
		<div class="top-bg"></div>
		<div class="middle-bg">
			<ul>
				<li><a href="/team/">Наша команда</a></li>
				<li class="active"><a>Вакансии</a></li>
				<li><a href="/team/resume/">Анкета</a></li>
			</ul>
		</div>
		<div class="bottom-bg"></div>
	</div>
</div>

<div class="action-block bonus-block">
	<div class="h1"><span>Вакансии</span></div>
	<div class="action-list">
		<div class="action-item">
			<img src="<?php echo $model->imagesUrl.'665x/'.$model['id']?>.jpg">
			
			<?php echo $model->text?>
			
		</div>
		<div class="wave-biege"></div>
	</div>
</div>