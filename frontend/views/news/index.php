<?php 

$this->menuActiveItems[FController::NEWS_MENU_ITEM] = 1;
?>
<div class="left-menu">
	<div class="top-bg"></div>
	<div class="middle-bg">
		<ul>
			<li><a href="/action/">Акции</a></li>
			<li class="active"><a >Новости</a></li>
		</ul>
	</div>
	<div class="bottom-bg"></div>
</div>

<div class="news-block">
	<div class="h1"><span>Новости</span></div>
	<div class="news-list">
		<?php foreach($news AS $key => $val) :?>
		<div class="news-item">
			<div class="date"><?php echo Yii::app()->dateFormatter->format("dd MMMM y", $val['createDate']);?></div>
			<div class="h2"><span><?php echo $val['name']?></span></div>
			<div class="h3"><span><?php echo $val['name2']?></span></div>
			<img src="<?php echo $val->imagesUrl.'665x/'.$val['id']?>.jpg">
			<div class="text"><?php echo $val['text']?></div>
		</div>
		<?php endforeach;?>
		<div class="wave-biege"></div>
	</div>
</div>
