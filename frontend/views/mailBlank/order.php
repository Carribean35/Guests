<?php 
$deviliry = array(1 => 'Забрать с собой( скидка -15%)', 2 => 'Доставка курьером');
$firstOrder = array(1 => 'Заказываю впервые', 2 => 'Заказывал(а) ранее');
$payType = array(1 => 'Карта', 2 => 'Наличные');
$dateType = array(1 => 'Как можно скорее', 2 => 'К определенному времени');

?>
<h2>Информация о заказчике</h2>
<table>
	<tr>
		<td style="width: 400px;">
			Способ доставки:
		</td>
		<td>

			<?php echo $deviliry[$order['deviliry']]?>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			<?php echo $firstOrder[$order['firstOrder']]?>
		</td>
	</tr>
	
	<tr>
		<td>
			Телефон:
		</td>
		<td>
			<?php echo $order['phone']?>
		</td>
	</tr>
	
	<tr>
		<td>
			Элетронная почта:
		</td>
		<td>
			<?php echo $order['email']?>
		</td>
	</tr>
	
	<tr>
		<td>
			Улица:
		</td>
		<td>
			<?php echo $order['street']?>
		</td>
	</tr>
	
	<tr>
		<td>
			Дом:
		</td>
		<td>
			<?php echo $order['house']?>
		</td>
	</tr>
	
	<tr>
		<td>
			Строение:
		</td>
		<td>
			<?php echo $order['building']?>
		</td>
	</tr>
	<tr>
		<td>
			Корпус:
		</td>
		<td>
			<?php echo $order['housing']?>
		</td>
	</tr>
	<tr>
		<td>
			Подъезд:
		</td>
		<td>
			<?php echo $order['porch']?>
		</td>
	</tr>
	<tr>
		<td>
			Этаж:
		</td>
		<td>
			<?php echo $order['floor']?>
		</td>
	</tr>
	<tr>
		<td>
			Квартира:
		</td>
		<td>
			<?php echo $order['apartment']?>
		</td>
	</tr>
	<tr>
		<td>
			Способ оплаты:
		</td>
		<td>
			<?php echo $payType[$order['payType']]?>
		</td>
	</tr>
	<tr>
		<td>
			Сдача с:
		</td>
		<td>
			<?php echo $order['oddMoney']?>
		</td>
	</tr>
	<tr>
		<td>
			Дата и время доставки:
		</td>
		<td>
			<?php echo $dateType[$order['dateType']]?>
			<?php if ($order['dateType'] == 2) : ?>
				<br>
				<?php echo $order['date']?> <?php echo $order['hour']?>:<?php echo $order['min']?>  
			<?php endif;?>
		</td>
	</tr>
	<tr>
		<td>
			Количество персон:
		</td>
		<td>
			<?php echo $order['personCount']?>
		</td>
	</tr>
	<tr>
		<td>
			Как узнали про нас:
		</td>
		<td>
			<?php echo $order['howKnow']?>
		</td>
	</tr>
	<tr>
		<td>
			Комментарий к заказу:
		</td>
		<td>
			<?php echo $order['comment']?>
		</td>
	</tr>
</table>

<h2>Заказ</h2>
<table style="width: 100%;">
	<tr>
		<td>#</td>
		<td>Название</td>
		<td>Цена за еденицу</td>
		<td>Количество</td>
		<td>Цена общая</td>
		
	</tr>

	<?php	$sum = 0; 
	foreach($order['dishes'] AS $key => $val) :?>
		<tr>
			<td><?php echo ($key + 1)?></td>
			<td><?php echo $val->name?></td>
			<td><?php echo $val->price?>руб.</td>
			<td><?php echo $val->hiddenCount?>шт.</td>
			<td><?php echo $val->price*$val->hiddenCount; $sum += $val->price*$val->hiddenCount;?>руб.</td>
		</tr>
	<?php endforeach;?>
	<tr style="border-top: solid">
		<td colspan="4">ИТОГО:</td>
		<td><?php echo $sum?>руб.</td>
	</tr>
</table>