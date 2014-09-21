<?php
include_once 'handler.php'; // проверяем авторизирован ли пользователь

if($user) {
// выводим информацию для пользователя
echo 'Привет, <b>'.$user['username'].'</b>!<br />
- <a href="exit.php">Выйти</a><br />
';

include 'core.php';

} else {
// выводим информацию для гостя
echo '
- <a href="login.php">Авторизация</a><br />
- <a href="register.php">Регистрация</a><br />
';
}
?>