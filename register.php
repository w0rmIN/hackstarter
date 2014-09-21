<?php
include_once 'handler.php'; // проверяем авторизирован ли пользователь

// если да, перенаправляем его на главную страницу
if($user) {
header ('Location: index.php');
exit();
}

if (!empty($_POST['login']) AND !empty($_POST['password']))
{
 // фильтрируем логин и пароль
 $login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
 $password = mysql_real_escape_string(htmlspecialchars($_POST['password']));

 
 // проверяем есть ли логин в нашей базе данных
	if (mysql_result(mysql_query("SELECT COUNT(*) FROM `users_profiles` WHERE `username` = '".$login."' LIMIT 1;"), 0) != 0)
	{
		echo 'Выбранный логин уже зарегистрирован!';
		echo "<br><a href='index.php'>На главную</a>";
		exit();
	}
 // заносим данные в таблицу, обратите внимание - пароль кодируем в md5
	mysql_query("INSERT INTO `users_profiles` (`username`, `password`) VALUES ('".$login."', '".md5($password)."')");
    echo 'Вы успешно зарегистрированы!';
    echo "<br><a href='index.php'>На главную</a>";

	exit();
}
 // форма регистрации
echo '
<form action="register.php" method="POST">
Логин:<br/>
<input name="login" type="text" value="" /><br/>
Пароль:<br/>
<input name="password" type="text" value="" /><br/>
<input type="submit" value="Зарегистрироваться" />
</form>';
?>