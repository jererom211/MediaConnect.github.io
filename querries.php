<?php
//ДОБАВЛЕНИЕ
$sql = "INSERT INTO koefs(team1,team2,wint1,draw,wint2) VALUES(
                            '$team1_new',
                            '$team2_new',
                            '$wint1_new',
                            '$draw_new',
                            '$wint2_new')";		



//ОБНОВЛЕНИЕ
$update = "UPDATE koefs SET team1='$team1', team2='$team2', wint1='$wint1', draw='$draw', wint2='$wint2' WHERE id = '$id' ";		

//УДАЛЕНИЕ
$sql = "DELETE FROM koefs WHERE id='$id' ";


//ВЫБОР
$result = mysql_query("SELECT * FROM user WHERE login = '$auth_login' AND password = '$auth_password'",$link); 

?>