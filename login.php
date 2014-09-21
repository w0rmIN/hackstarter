<?php
include_once 'handler.php'; // проверяем авторизирован ли пользователь

// если да, перенаправляем его на главную страницу
if($user) {
header ('Location: index.php');
exit();
}

if(!empty($_POST['login']) AND !empty($_POST['password']))
{
 // фильтрируем логин и пароль
 $login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
 $password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
 
	$search_user = mysql_result(mysql_query("SELECT COUNT(*) FROM `users_profiles` WHERE `username` = '".$login."' AND `password` = '".md5($password)."'"), 0);
	if($search_user == 0)
	{
		echo 'Введенные данные неправильные или пользователь не найден.';
		echo "<br><a href='index.php'>На главную</a>";
		exit();
	}
	else
	{
	    // заносим логин и пароль в куки
		$time = 60*60*24; // сколько времени хранить данные в куках
		setcookie('username', $login, time()+$time, '/');
		setcookie('password', md5($password), time()+$time, '/');
		echo 'Вы успешно авторизировались на сайте!';
		echo "<br><a href='index.php'>На главную</a>";
		exit();
	}
}
echo '
<form action="login.php" method="POST">
Логин:<br />
<input name="login" type="text" /><br />
Пароль:<br />
<input name="password" type="password" /><br />
<input type="submit" value="Авторизироваться" />
</form>';
echo "<br><a href='index.php'>На главную</a>";
?>