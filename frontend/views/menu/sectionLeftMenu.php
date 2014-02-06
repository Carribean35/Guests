<div class="left-menu biege">
	<div class="top-bg"></div>
	<div class="middle-bg">
		<ul>
			<?php
				$openItem = false; 
				$menuHeader = '';
				foreach ($menuItems AS $key => $val) :?>
					<?php if (!empty($section) && (($val['id'] == $section->id && $section->level == 0) || ($val['id'] == $section->pid && $section->level == 1))) :
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
	