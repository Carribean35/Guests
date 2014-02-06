<?php 
$this->menuActiveItems[FController::MENU_MENU_ITEM] = 1;
?>
<div class="left-column-block">
	<?php echo $sectionLeftMenu?>
	<?php echo $check?>
</div>

<div class="menu-block">
	<div class="h1"><span class="white"><?php echo $section->name;?></span></div>
	<div class="menu-list">
		<?php foreach($dishs AS $key => $val) :?>
			<div class="menu-item" id="dish-<?php echo $val['id']?>">
			<div class="img-container">
				<a href="javascript:void(0);" class="detailDish" rel="<?php echo $val['id']?>">
					<img src="<?php echo $val->imagesUrl.'199x129/'.$val['id']?>.jpg">
					<div class="corner tl"></div>
					<div class="corner tr"></div>
				</a>
			</div>
			<div class="content-container">
				<div class="name"><?php echo $val['name']?></div>
				<div class="price"><?php echo $val['price']?> Р</div>
				<div class="weight"><?php echo $val['weight']?> гр.</div>
				<div class="text"><?php echo $val['text']?></div>
				<div class="line"></div>
				<input type="text" class="dish-cart-count" value="1">
				<div class="add-to-cart-button"></div>
			</div>
		</div>
		<?php endforeach;?>
		<div class="clear"></div>
	</div>
</div>
<div class="wave-white"></div>

<!-- Modal -->
<div class="modal fade" id="dishModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-body">
		<div class="img-container">
			<img src="img/dish-big-1.jpg">
		</div>
		<div class="dish-info-container">
			<div class="name">Роллы</div>
			<div class="info">
				<div class="text">Сочный салат Айсберг с обжареным филе цыпленка, соусом Цезарь, хрустящими гренками и сыром Пармезан</div>
				<div class="line"></div>
				<div class="weight">50 гр.</div>
				<div class="price">120 Р</div>
				<div class="clear"></div>
				<div class="line"></div>
				<input type="text" class="dish-cart-count" value="1">
				<div class="add-to-cart-button"></div>
			</div>
		</div>
		<div class="clear"></div>
	  </div>
	</div>
  </div>
</div>