<div class="news-main-block">
	<?php foreach($news AS $key => $val) :?>
	<div class="news-item">
		<div class="date"><?php echo Yii::app()->dateFormatter->format("dd MMMM y", $val['createDate']);?></div>
		<div class="line"></div>
		<div class="name">
			<a href="/news/#news_<?php echo $val['id']?>">
				<?php echo $val['name']?>
			</a>
		</div>
	</div>
	<?php endforeach;?>	
	<div class="clear"></div>
</div>