<?php 
$this->menuActiveItems[FController::TEAM_MENU_ITEM] = 1;
?>
<div class="left-column-block">
	<div class="left-menu">
		<div class="top-bg"></div>
		<div class="middle-bg">
			<ul>
				<li class="active"><a>Наша команда</a></li>
				<li><a href="/team/job/">Вакансии</a></li>
				<li><a href="/team/resume/">Анкета</a></li>
			</ul>
		</div>
		<div class="bottom-bg"></div>
	</div>
</div>

<div class="action-block team-block">
	<div class="h1"><span>Наша команда</span></div>
	<div class="action-list">
		<div class="action-item">
			
			<div class="gallery-team">
				<div class="ul-container">
					<ul>
						<?php foreach($teamGallery AS $key => $val) :?>
						<li><img src="<?php echo $val->imagesUrl.'665x439/'.$val['id']?>.jpg"><div class="alt"><?php echo $val['name']?></div></li>
						<?php endforeach;?>
					</ul>
				</div>
				<div class="left-arrow"></div>
				<div class="right-arrow"></div>
				<div class="corner tl"></div>
				<div class="corner tr"></div>
				<div class="corner br"></div>
				<div class="corner bl"></div>
			</div>
			
		</div>
		<div class="wave-biege white"></div>
		<div class="action-item white">
			<div class="h2"><span>Я выбрал работу в &laquo;Гости&raquo;</span></div>
			<div class="h3"><span>потому что ...</span></div>
			<div class="history-list">
				<?php foreach($workers AS $key => $val) :?>
				<div class="history-item">
					<img src="<?php echo $val->imagesUrl.'208x314/'.$val['id']?>.jpg">
					<div class="post"><?php echo $val['post']?></div>
					<div class="name"><?php echo $val['name']?></div>
					<div class="line"></div>
					<div class="text"><?php echo $val['text']?></div>
					<div class="corner tl"></div>
					<div class="corner tr"></div>
				</div>
				<?php endforeach;?>
				<div class="clear"></div>
			</div>
		</div>
		<div class="wave-white"></div>
	</div>
</div>