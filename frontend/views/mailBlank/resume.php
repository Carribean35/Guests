<h2>Резюме</h2>
<table>
	<tr>
		<td style="width: 400px;">ФИО:</td>
		<td><?php echo $model['fio']?></td>
	</tr>
	<tr>
		<td>Дата рождения:</td>
		<td><?php echo $model['birthDate']?></td>
	</tr>
	<tr>
		<td>Гражданство:</td>
		<td><?php echo $model['nationality']?></td>
	</tr>
	<tr>
		<td>Фактический адрес проживания:</td>
		<td><?php echo $model['address']?></td>
	</tr>
	<tr>
		<td>Где желаете работать:</td>
		<td><?php echo $model->workPlaces[$model['workPlace']]?></td>
	</tr>
	<tr>
		<td>Телефон:</td>
		<td><?php echo $model['phone']?></td>
	</tr>
	<tr>
		<td>Предыдущее или настоящее место работы(учебы):</td>
		<td><?php echo $model['lastWork']?></td>
	</tr>
	<tr>
		<td>Работу в ресторанах на каждый день рассматриваю как:</td>
		<td><?php echo $model->workTypes[$model['workType']]?></td>
	</tr>
	<tr>
		<td>Желаемая должность:</td>
		<td><?php echo $model['wantPost']?></td>
	</tr>
	<tr>
		<td>Желаемый график работы:</td>
		<td><?php echo $model['wantSchedule']?></td>
	</tr>
	
</table>
