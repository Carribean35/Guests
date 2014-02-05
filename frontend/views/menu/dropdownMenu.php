<div class="submenu" id="submenu">
	<div class="submenu-content">
	
		<div class="column column-1">
		<?php 
			$column_height = 0;
			$i = 1;
			$first = true;
			foreach ($rows AS $key => $val) :?>
				<?php if ($column_height > 350) :
					$column_height = 0;
					$i++;
					$first = true;
					?>
						</div>
					</div>	
					<div class="column column-<?php echo $i;?>">
				<?php endif;?>

			<?php if ($val['level'] == 0) :?>
				<?php $column_height += 20;?>
				<?php if (!$first):?>
					</div>
				<?php endif;?>
				<div class="submenu-item">
					<div class="headline"><a href="/menu/<?php echo $val['id']?>/"><?php echo $val['name']?></a></div>
				
			<?php else :?>
				<div><a href="/menu/<?php echo $val['id']?>/"><?php echo $val['name']?></a></div>
			<?php endif;?>
			<?php 	$first = false;
					$column_height += 23;
			?>
		<?php endforeach;?>
			</div>
		</div>
	</div>
	<div class="bottom-bg"></div>
</div>