<?php 
$this->menuActiveItems[FController::REVIEW_MENU_ITEM] = 1;
?>
<div class="review-list-block">
	<div class="review-list">
	<?php $types = array(1 => 'Довольный гость', 2 => 'Разочарованный гость', 3 => 'Предложение')?>
		<?php foreach($reviews AS $key => $val) :?>
		<div class="action-item?>">
			<div class="h2"><span><?php echo $types[$val['type']]?></span></div>
			<div class="h3"><span><?php echo $val['name']?></span></div>
			<div class="date"><?php echo Yii::app()->dateFormatter->format("dd MMMM y", $val['date']);?>
				<?php if (!empty($val['place'])) : ?>
					<div class="place"><?php echo $val->workPlaces[$val['place']]?></div>
				<?php endif;?>
			</div>
			<div class="text"><?php echo $val['text']?></div>
			<?php if (!empty($val['answer'])) : ?>
				<div class="answer"><?php echo $val['answer']?></div>
			<?php endif;?>
		</div>
		<?php endforeach;?>
	</div>
</div>
<div class="wave-biege"></div>