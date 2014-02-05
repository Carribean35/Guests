<div class="left-column-block">
	<div class="left-menu biege">
		<div class="top-bg"></div>
		<div class="middle-bg">
			<ul>
				<?php
					$openItem = false; 
					$menuHeader = '';
					foreach ($menuItems AS $key => $val) :?>
						<?php if (($val['id'] == $section->id && $section->level == 0) || ($val['id'] == $section->pid && $section->level == 1)) :
								$openItem = true;
								$menuHeader = $val['name'];?>
							<li class="active">
								<div class="line"></div>
								<a href="/menu/<?php echo $val['id']?>/"><?php echo $val['name']?></a>
								<ul>
						<?php else :?>
							<?php if ($openItem && $val['level'] == 0) :
								$openItem = false;?>
								</ul>
								<div class="line"></div>
							</li>
							<?php endif;?>
							<li><a href="/menu/<?php echo $val['id']?>/"><?php echo $val['name']?></a></li>
						<?php endif;?>
				<?php endforeach;?>
				<?php if ($openItem) :
					$openItem = false;?>
					</ul>
					<div class="line"></div>
				</li>
				<?php endif;?>

			</ul>
		</div>
		<div class="bottom-bg"></div>
	</div>
	<div class="check">
		<div class="check-middle">
			<div class="check-top">
				<div class="check-headline">ВАШ ЗАКАЗ</div>
				<div class="order-list">
					<div class="border"></div>
					<div class="order-list-item">
						<div class="name">Цезарь с цыпленком</div>
						<div class="price">
							<b>250</b> руб.
						</div>
						<div class="clear"></div>
					</div>
					<div class="order-list-item">
						<div class="name">Цезарь с цыпленком</div>
						<div class="price">
							<b>250</b> руб.
						</div>
						<div class="clear"></div>
					</div>
					<div class="order-list-item result">
						<div class="name">ИТОГО</div>
						<div class="price">
							<b>500</b> руб.
						</div>
						<div class="clear"></div>
					</div>
					<div class="border"></div>
				</div>
				<div class="button-issue"></div>							
			</div>
		</div>
		<div class="check-bottom"></div>
	</div>
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