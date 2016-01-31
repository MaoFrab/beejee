	<div class="row">
	<div class="col-md-8 text-left"><h1>Панель администрирования</h1></div>
	<div class="col-md-4 text-right"><a href="logout">Выход</a></div>
</div>


<table class="table table-hover table-bordered">
<tr><td>id</td><td>Email</td><td>Имя</td><td>Тема</td><td>Текст</td><td>Редактировать</td><td>Активен/Неактивен</td><td>Удалить</td><td>Дата создания</td></tr>

<?php
	foreach($data as $row)
	{

		if($row["is_valid"] == true) 
			$valid = "class='success'"; 
		else $valid = "class='danger'";

		echo '<tr '.$valid.'><td>'.$row['id'].'</td>
		<td>'.$row['email'].'</td>
		<td>'.$row['username'].'</td>
		<td>'.$row['subject'].'</td>
		<td>'.$row['text'].'</td>
		<td><form action=\'admin/post_edit_get\' method=\'post\'><input type="hidden" name="id" value='.$row['id'].'><button type=\'submit\' >Редактировать</button></form></td>
		<td><form id="form_validate" action=\'admin/post_set_valid\' method=\'post\'><input type="hidden" name="id" value='.$row['id'].'><button type=\'method\'>Активен/Неактивен</button></form></td>
		<td><form action=\'admin/post_delete\' method=\'post\'><input type="hidden" name="id" value='.$row['id'].'><input type="hidden"><button type=\'submit\' >Удалить</button></form></td>
		<td>'.$row['date'].'</td>
		</tr>';
	}
	
?>
</table>