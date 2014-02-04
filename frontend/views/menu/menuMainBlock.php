<?php foreach ($sections AS $key => $val) :?>
<div class="main-menu-item">
	<a href="/menu/<?php echo $val['id']?>/">
		<img src="<?php echo $val->imagesUrl.'208x131/'.$val['id']?>.jpg">
		<div class="name"><?php echo $val['name']?></div>
	</a>
	<div class="corner tl"></div>
	<div class="corner tr"></div>
	<div class="corner br"></div>
	<div class="corner bl"></div>
</div>
<?php endforeach;?>