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
			<div class="h2"><span>Объявление к ковбою:</span></div>
			<div class="text">
			
				<?php echo $model->text?>
				<div class="line"></div>
				<p style="color: #ac1d1d; font-style:italic; text-align: center;">Короче, надо поговорить, звони!</p>
				<br>
			
				<div style="text-align:center;">
				<b style="color: #ac1d1d; font-size:20px;">8 917 763 52 00</b> (Анна)<br>
				Или приходи по будням с 10:00-12:00 и с 15:00-18:00<br>
				<b>ул. Цюрупы 12,</b><br>
				<b>ул.Софьи Перовской 42.</b></br>
				<br>
				<i>Либо заполни анкету здесь</i>
				<br>
				<a href="/team/resume/" class="anketa-button"></a>
				</div>
			
			
			
			</div>
						
		</div>
		<div class="wave-biege"></div>
	</div>
</div>