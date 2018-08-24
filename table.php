<?php
	echo '<table class = "main_table">';
	if($_SESSION['auth_group']  == 'admin')														//Отображение заголовка таблицы для администратора
	{
		echo '<tr>
		<th class = "table_head">Команда 1</th>
		<th class = "table_head">Команда 2</th>
		<th class = "table_head">Победа 1</th>
		<th class = "table_head">Ничья</th>
		<th class = "table_head">Победа 2</th>
		<th class = "table_head">Сохранить</th>
		<th class = "table_head">Удалить</th>
		<th class = "table_head">Голы 1</th>
		<th class = "table_head">Голы 2</th>
		<th class = "table_head">Закончить</th>
		</tr>';
	}
	else 																						//Отображение заголовка таблицы для других групп
	{
		echo '<tr>
		<th class = "table_head">Команда 1</th>
		<th class = "table_head">Команда 2</th>
		<th class = "table_head">Победа 1</th>
		<th class = "table_head">Ничья</th>
		<th class = "table_head">Победа 2</th>
		</tr>';
	}

	$result=mysql_query("SELECT * FROM `koefs`", $link);										//Выбор всех матчей из БД
	if (mysql_num_rows($result)>0)
	{
    	$row=mysql_fetch_array($result);
    do
    {
	    if($_SESSION['auth_group']  == 'admin')													// Отображение редактируемых полей для администратора
	    {		
		echo('
			<tr>
			<td><input type="text" size="15" id="team1_'.$row["id"].'" value="'.$row["team1"].'"></td>
			<td><input type="text" size="15" id="team2_'.$row["id"].'"value="'.$row["team2"].'">	</td>
			<td><input type="text" size="10" id="wint1_'.$row["id"].'"value="'.$row["wint1"].'"></td>
			<td><input type="text" size="10" id="draw_'.$row["id"].'"value="'.$row["draw"].'"></td>
			<td><input type="text" size="10" id="wint2_'.$row["id"].'"value="'.$row["wint2"].'"></td>
			');
		}
		else 																				//Отображение кликабельных коэффициентов для обычных пользователей
		{
			echo('
				<tr>
				<td class="td_inactive"><input type="button" type="text" size="10" onclick="info_match('.$row["id"].')" id="team1_'.$row["id"].'" value="'.$row["team1"].'"></td>
				<td class="td_inactive"><input type="button" type="text" size="10" onclick="info_match('.$row["id"].')" id="team2_'.$row["id"].'" value="'.$row["team2"].'"></td>
				<td class="td_all" align="center"><input class="bets_buttons" type="button" id="wint1_'.$row["id"].'" onclick="bet('.$row["wint1"].','.$row["id"].',1)" value="'.$row["wint1"].'"></td>
				<td class="td_all" align="center"><input class="bets_buttons" type="button" id="draw_'.$row["id"].'" onclick="bet('.$row["draw"].','.$row["id"].',`x`)" value="'.$row["draw"].'"></td>
				<td class="td_all" align="center"><input class="bets_buttons" type="button" id="wint2_'.$row["id"].'" onclick="bet('.$row["wint2"].','.$row["id"].',2)" value="'.$row["wint2"].'"></td>
			');
		}

			if ($_SESSION['auth_group']  == 'admin') 												//Неоходимые поля администратора для редактирования
			{
			          echo '
			          <td class="td_all1"><button class="but_adm" onclick="send_table('.$row["id"].')" name="button_table_'.$row[id].'">Сохранить</button></td>
			          <td class="td_all1"><button class="but_adm" onclick="delete_game('.$row["id"].')">Удалить</button></td>

			          <td class="td_all1"><input class="but_adm" type="text" id="team1_goals_'.$row["id"].'"  value="';if($row["team1_goals"]>=0){echo $row["team1_goals"];} echo'"></td>
			          <td class="td_all1"><input class="but_adm" type="text" id="team2_goals_'.$row["id"].'"  value="';if($row["team1_goals"]>=0){echo $row["team2_goals"];} echo'"></td>
			          <td class="td_all1"><input class="but_adm" type="button" onclick="finish_game('.$row["id"].')" id="finish_game_'.$row["id"].'"  value="Закончить"></td>
			          ';
			       
			 		   echo' 
					   </tr>
					   ';
		 }
	}
    while ($row=mysql_fetch_array(($result)));
	}

	?>