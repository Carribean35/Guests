<?php 
$this->menuActiveItems[FController::ABOUT_MENU_ITEM] = 1;
?>
<div class="about-block">
	<div class="about-text-container">
		<div class="h1"><span class="white">О ресторане</span></div>
		<div class="text">
			<?php echo $about->text?>
		</div>
	</div>
	<div class="wave-white"></div>
	<div class="about-list">
		<?php foreach ($filials AS $key => $val) :?>
			<div class="about-item <?php if ($key % 2 == 1) : ?>white<?php endif?>">
				<div class="h2"><span>Ресторан</span></div>
				<div class="h3">на <?php echo $val['addressStreet']?></div>
				<div class="text"><?php echo $val['text']?></div>
				<?php $cof = $val['smoking'] + $val['nosmoking'] + $val['hall'] + $val['wifi'] + $val['vip'];?>
				<div class="icons" style="width: <?php echo (72 * $cof);?>px;">
					<?php if (!empty($val['smoking'])) :?>
					<div class="icon icon-smoking"></div>
					<?php endif;?>
					<?php if (!empty($val['nosmoking'])) :?>
					<div class="icon icon-nosmoking"></div>
					<?php endif;?>
					<?php if (!empty($val['hall'])) :?>
					<div class="icon icon-children"></div>
					<?php endif;?>
					<?php if (!empty($val['wifi'])) :?>
					<div class="icon icon-wifi"></div>
					<?php endif;?>
					<?php if (!empty($val['vip'])) :?>
					<div class="icon icon-vip"></div>
					<?php endif;?>	
					<div class="clear"></div>
				</div>
				<div class="h2"><span>Фотографии</span></div>
				<div class="h3">ресторана на <?php echo $val['addressStreet']?></div>
				<div class="filial-gallery <?php if ($key % 2 == 1) : ?>biege<?php else: ?>white<?php endif?>">
					<div class="corners tl"></div>
					<div class="corners tr"></div>
					<div class="corners bl"></div>
					<div class="corners br"></div>
				</div>
				<div class="h2"><span>Виртуальный тур</span></div>
				<div class="h3">ресторана на <?php echo $val['addressStreet']?></div>
				<a href="#" class="virtual-tour">
					<div class="icon-eye"></div>
					Посмотреть тур
				</a>
			</div>
			<?php if ($key % 2 == 1) : ?>
				<div class="wave-white"></div>
			<?php else :?>
				<div class="wave-biege white"></div>
			<?php endif?>
			
		<?php endforeach;?>
		
	</div>
</div>