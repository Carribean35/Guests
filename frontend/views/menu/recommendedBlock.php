<div class="recomended">
	<div class="recomended-headline">РЕКОМЕНДУЕМ</div>
	<div class="recomended-list">
		<div class="border"></div>
		<?php foreach($dish AS $key => $val) :?>
		<div class="recomended-list-item">
			<div class="name"><?php echo $val['name']?></div>
			<div class="weight"><?php echo $val['weight']?> гр.</div>
			<div class="price"><?php echo $val['price']?> руб.</div>
			<img src="<?php echo $val->imagesUrl."199x129/".$val['id'].".jpg"?>" class="img">
		</div>
		<?php endforeach;?>
		<div class="border"></div>
	</div>
</div>