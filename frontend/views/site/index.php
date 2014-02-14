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
				
				<div class="call fright"></div>
				<div class="clear"></div>
				<div class="line"></div>
				<div class="dish-cart-count-modal-container">
					<input type="text" class="dish-cart-count" value="1">
					<ul class="dish-cart-count-list">
						<li>1</li>
						<li>2</li>
						<li>3</li>
						<li>4</li>
						<li>5</li>
						<li>6</li>
						<li>7</li>
						<li>8</li>
						<li>9</li>
						<li>10</li>
					</ul>
				</div>
				<div class="price fright"></div>
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