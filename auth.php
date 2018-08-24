<?php  
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{ 
        define('forfun', true); 
        session_start();                                            //Старт сессии
		$auth_login = $_POST["auth_login"];
        $auth_password = md5($_POST["auth_password"]);              //Прием параметров от клиентов через js (auth.js)
    	include '../blocks/connection.php';

        if ($_POST["auth_rememberme"] == "yes")                     //Если нажата кнопка "запомнить меня"
            {
                setcookie('rememberme',$auth_login.'+'.$auth_password,time()+3600*24*31, "/");         //Создане cookie файла (авторизация через cookie отдельно)
                echo 'true';    
            }
        else
            {
    	        $result = mysql_query("SELECT * FROM user WHERE login = '$auth_login' AND password = '$auth_password'",$link);  // Выбор из БД логина+пароля
                if (mysql_num_rows($result) > 0)                                                                                // Если удачно записываем в сессиюы
                    {
                        $row = mysql_fetch_array($result);
                        $_SESSION['auth'] = 'yes_auth';
                        $_SESSION['auth_id'] = $row["id"];
                        $_SESSION['auth_password'] = $row["password"];
                        $_SESSION['auth_login'] = $row["login"];
                        $_SESSION['auth_balance'] = $row["balance"];
                        $_SESSION['auth_group'] = $row["group"];
                        echo 'true';  
                    }
                else
                echo 'false'; 
            }
    }
?>