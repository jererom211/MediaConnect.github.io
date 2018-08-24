<?php  
    if($_SERVER["REQUEST_METHOD"] == "POST")
    { 
        $team1_new = $_POST["team1_new"];
        $team2_new = $_POST["team2_new"];
      
        $wint1_new = $_POST["wint1_new"];
        $draw_new = $_POST["draw_new"];
        $wint2_new = $_POST["wint2_new"];                                                   //Полученные значения из ajax-метода (аналогичн с auth.php)

        include '../blocks/connection.php';
        $sql = "INSERT INTO koefs(team1,team2,wint1,draw,wint2) VALUES(
                            '$team1_new',
                            '$team2_new',
                            '$wint1_new',
                            '$draw_new',
                            '$wint2_new')";                                                 //Запрос на добавление нового матча
                            

        if( mysql_query($sql) )                                                             //Выполнение запроса
        echo 'true'; 

    } 

?>