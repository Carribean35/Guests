<?php 
$this->menuActiveItems[FController::ABOUT_MENU_ITEM] = 1;

$fancyboxPath = Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/fancybox/'
);

//<!-- Add fancyBox -->
//<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
//<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

//<!-- Optionally add helpers - button, thumbnail and/or media -->
//<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
//<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
//<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

//<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
//<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>


Yii::app()->clientScript->registerScriptFile(
	$fancyboxPath.'/jquery.fancybox.pack.js',
	CClientScript::POS_END
);

Yii::app()->clientScript->registerScriptFile(
	$fancyboxPath.'/helpers/jquery.fancybox-buttons.js',
	CClientScript::POS_END
);

Yii::app()->clientScript->registerScriptFile(
	$fancyboxPath.'/helpers/jquery.fancybox-media.js',
	CClientScript::POS_END
);

Yii::app()->clientScript->registerScriptFile(
	$fancyboxPath.'/helpers/jquery.fancybox-thumbs.js',
	CClientScript::POS_END
);

Yii::app()->clientScript->registerCssFile(
	$fancyboxPath.'/jquery.fancybox.css',
	'',
	CClientScript::POS_END
);

Yii::app()->clientScript->registerCssFile(
	$fancyboxPath.'/helpers/jquery.fancybox-buttons.css',
	'',
	CClientScript::POS_END
);

Yii::app()->clientScript->registerCssFile(
	$fancyboxPath.'/helpers/jquery.fancybox-thumbs.css',
	'',
	CClientScript::POS_END
);

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
					<?php foreach($gallerys[$val['id']]->getImages() AS $image) :
					
						
					
						$width = mt_rand(150, 250);
						$height = (int)($width * 600 / 1000);
						$left = mt_rand(-20, 665 - $width + 30);
						$top = mt_rand(0, 220 - $height + 20);
						
						$rotate = mt_rand(-30, 30);
						
						$rotate = "	-webkit-transform: rotate(".$rotate."deg); /* Chrome y Safari */
									-moz-transform: rotate(".$rotate."deg); /* Firefox */
									-o-transform: rotate(".$rotate."deg); /* Opera */
						";
					
					?>
						<a class="fancybox" rel="gallery<?php echo $val->id?>" href="<?php echo $gallerys[$val->id]->ImagesUrl."1000x600/".$val->id."/".$image?>"
							style="left: <?php echo $left?>px; top: <?php echo $top?>px; <?php echo $rotate;?>";
						>
							<img src="<?php echo $gallerys[$val->id]->ImagesUrl."1000x600/".$val->id."/".$image?>" 
							style="width: <?php echo $width;?>px;">
						</a>
					<?php endforeach;?>
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

<script type="text/javascript">
	$(document).ready(function() {
		$("a.fancybox").fancybox({
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});
</script>