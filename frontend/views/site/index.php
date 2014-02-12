<div class="banner-block">
	<div class="left">
		<div class="delivery-icon"></div>
		<div class="delivery">ДОСТАВКА</div>
		<div class="phone"><?php echo $this->site->phone?></div>
		<div class="more-info">
			<a href="/delivery/">Узнать подробнее>></a>
		</div>
		<div class="call-me">
			<div class="call-me-icon call-me-show"></div>
			<a href="javascript: void(0);" class="call-me-show">
				Заказать звонок
			</a>
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
		
		<?php echo $recommended;?>
	</div>
	<div class="right">
		<?php echo $menuMainBlock; ?>
	</div>
	<div class="clear"></div>
</div>
<div class="wave-white"></div>