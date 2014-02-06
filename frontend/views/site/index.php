<div class="banner-block">
	<div class="left">
		<div class="delivery">ДОСТАВКА</div>
		<div class="phone">272-43-43</div>
		<div class="more-info">
			<a href="#">Узнать подробнее>></a>
		</div>
		<div class="call-me">
			Заказаь звонок
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
		<div class="check">
			<div class="check-middle">
				<div class="check-top">
					<div class="check-headline">ВАШ ЗАКАЗ</div>
					<div class="order-list">
						<div class="border"></div>
						<div class="order-list-item">
							<div class="name">Цезарь с цыпленком</div>
							<div class="price">
								<b>250</b> руб.
							</div>
							<div class="clear"></div>
						</div>
						<div class="order-list-item">
							<div class="name">Цезарь с цыпленком</div>
							<div class="price">
								<b>250</b> руб.
							</div>
							<div class="clear"></div>
						</div>
						<div class="order-list-item result">
							<div class="name">ИТОГО</div>
							<div class="price">
								<b>500</b> руб.
							</div>
							<div class="clear"></div>
						</div>
						<div class="border"></div>
					</div>
					<div class="button-issue"></div>							
				</div>
			</div>
			<div class="check-bottom"></div>
		</div>
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