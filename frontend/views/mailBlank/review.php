<?php 
	$types = array(1 => 'Довольный гость', 2 => 'Разочарованный гость', 3 => 'Предложение');
?>

<h2><?php echo $types[$model->type]?></h2>
<table>
	<tr>
		<td>Ресторан:</td>
		<td><?php echo $model->workPlaces[$model['place']]?></td>
	</tr>
	<tr>
		<td style="width: 400px;">Имя:</td>
		<td><?php echo $model['name']?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><?php echo $model['email']?></td>
	</tr>
	<tr>
		<td>Телефон:</td>
		<td><?php echo $model['phone']?></td>
	</tr>
	<tr>
		<td>Дата:</td>
		<td><?php echo $model['date']?></td>
	</tr>
	<tr>
		<td>Текст:</td>
		<td><?php echo $model['text']?></td>
	</tr>
</table>
