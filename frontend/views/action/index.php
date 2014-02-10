<?php 
$this->menuActiveItems[FController::ACTION_MENU_ITEM] = 1;
?>
<div class="left-column-block">
	<div class="left-menu">
		<div class="top-bg"></div>
		<div class="middle-bg">
			<ul>
				<li class="active"><a>Акции</a></li>
				<li><a href="/news/">Новости</a></li>
			</ul>
		</div>
		<div class="bottom-bg"></div>
	</div>
</div>

<div class="action-block">
	<div class="h1"><span>Акции</span></div>
	<div class="action-list">
		<?php foreach($actions AS $key => $val) :?>
		<div class="action-item <?php if ($key % 2 == 1) echo "white"?>">
			<img src="<?php echo $val->imagesUrl.'665x/'.$val['id']?>.jpg">
			<div class="h2"><span><?php echo $val['name']?></span></div>
			<div class="text"><?php echo $val['text']?></div>
		</div>
		<div class="<?php echo ($key % 2 == 0) ? "wave-biege ".(($key == count($actions) - 1) ? '' : 'white') : "wave-white";?>"></div>
		<?php endforeach;?>
	</div>
</div>
