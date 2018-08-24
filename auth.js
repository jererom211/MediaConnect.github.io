$( document ).ready(function() {
	$('#button_auth').click(function(){                           //По нажатию на кнопку входа
		 var auth_login = $("#auth_email").val();                   //Введенные логин и пароль из полей формы
		 var auth_password = $("#auth_pass").val();
	   if ($("#rememberme").prop('checked'))                     // Если необходимо запомнить
 	    {
   		  auth_rememberme = 'yes';
 	    }
      else { auth_rememberme = 'no'; }

		  $.ajax({                                                  //Метод ajax
      type: "POST",                                                                                                 //Метод POST
      url: "../conn_bd/auth.php",                                                                                   //Подключаемый файл
      data: "auth_login="+auth_login+"&auth_password="+auth_password+"&auth_rememberme="+auth_rememberme,           //Передаваемые параметры
      dataType: "html",
      cache: false,
      success: function(info) {
        if (info=='true')                                                                                           //Если удачно перезагрузка стр
        {
          location.reload();
        }
        else                                                                                                        //Сообщение об ошибке
        {
          $("#hide_auth").fadeIn(400).html("Uncorrect login and password");
      
        }
      }
      });  
	});
});