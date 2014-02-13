<div class="left-column-block">
	<?php echo $sectionLeftMenu?>
	<?php echo $check?>
</div>

<div class="menu-block">
	<div class="h1"><span class="white">Поиск</span></div>
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
				<input type="hidden" value="<?php echo $val['id']?>" class="dishId">
				<div class="name"><?php echo $val['name']?></div>
				<div class="price"><span><?php echo $val['price']?></span> Р</div>
				<div class="weight fleft"><?php echo $val['weight']?> гр.</div>
				<div class="call fright"><?php echo $val['calories']?> калл.</div>
				<div class="clear"></div>
				<div class="text"><?php echo $val['text']?></div>
				<div class="line"></div>
				<input type="text" class="dish-cart-count" value="1">
				<div class="add-to-cart-button" data-bind="click: function(data, bind) {
					var self = $(bind.currentTarget);
					var count = self.parent().find('.dish-cart-count').val();
					var name = self.parent().find('.name').html();
					var text = self.parent().find('.text').html();
					
					addGoods(<?php echo $val['id']?>,
							name,
							'<?php echo $val['price']?>',
							text,
							count
					);
				}"></div>
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
			<img src="">
		</div>
		<div class="dish-info-container">
			<div class="name"></div>
			<div class="info">
				<input type="hidden" value="" class="dishId">
				<div class="text"></div>
				<div class="line"></div>
				<div class="weight fleft"></div>
				<div class="price fleft"></div>
				<div class="call fright"></div>
				<div class="clear"></div>
				<div class="line"></div>
				<input type="text" class="dish-cart-count" value="1">
				<div class="add-to-cart-button"  data-bind="click: function(data, bind) {
					var self = $(bind.currentTarget);
					var count = self.parent().find('.dish-cart-count').val();
					var name = self.parent().parent().find('.name').html();
					var text = self.parent().find('.text').html();
					var price = self.parent().find('.price span').html();
					var id = self.parent().find('.dishId').val();
					
					addGoods(id,
							name,
							price,
							text,
							count
					);
				}"></div>
			</div>
		</div>
		<div class="clear"></div>
	  </div>
	</div>
  </div>
</div>