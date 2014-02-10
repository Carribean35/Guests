<div class="banner-block">
	<div class="left">
		<div class="delivery">ДОСТАВКА</div>
		<div class="phone"><?php echo $this->site->phone?></div>
		<div class="more-info">
			<a href="#">Узнать подробнее>></a>
		</div>
		<div class="call-me">
			Заказать звонок
		</div>
	</div>
	<div class="right">
		<div class="gallery-ben">
			<div class="ul-container">
				<ul>
					<?php foreach($mainGallery->images AS $key => $val) :?>
					<li><img src="<?php echo $mainGallery->ImagesUrl."655x346/".$val?>"></li>
					<?php endforeach;?>
				</ul>
			</div>
			<div class="paginat" style="width:<?php echo count($mainGallery->images) * 15?>px">
				<ul>
					<?php foreach($mainGallery->images AS $key => $val) :?>
						<li <?php if ($key == 0) :?>class="active"<?php endif;?> rel="<?php echo $key?>"></li>
					<?php endforeach;?>
					
				</ul>
			</div>
			
			<div class="corner tl"></div>
			<div class="corner tr"></div>
			<div class="corner br"></div>
			<div class="corner bl"></div>
		</div>
	
	</div>
</div>
<?php echo $newsMainBlock; ?>
<div class="wave-biege white"></div>

<div class="menu-main-block">
	<div class="left">
		
		<?php echo $check;?>
		
		<div class="recomended">
			<div class="recomended-headline">РЕКОМЕНДУЕМ</div>
			<div class="recomended-list">
				<div class="border"></div>
				<div class="recomended-list-item">
					<div class="name">Спайси с тунцом</div>
					<div class="weight">45 гр.</div>
					<div class="price">59 руб</div>
					<img src="img/recomended-img-1.jpg" class="img">
				</div>
				<div class="recomended-list-item">
					<div class="name">Спайси с тунцом</div>
					<div class="weight">45 гр.</div>
					<div class="price">59 руб</div>
					<img src="img/recomended-img-1.jpg" class="img">
				</div>
				<div class="recomended-list-item">
					<div class="name">Спайси с тунцом</div>
					<div class="weight">45 гр.</div>
					<div class="price">59 руб</div>
					<img src="img/recomended-img-1.jpg" class="img">
				</div>
				<div class="border"></div>
			</div>
		</div>
	</div>
	<div class="right">
		<?php echo $menuMainBlock; ?>
	</div>
	<div class="clear"></div>
</div>
<div class="wave-white"></div>