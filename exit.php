<?php
include_once 'handler.php'; // проверяем авторизирован ли пользователь

// проверяем авторизацию пользователя
 if($user) {
 setcookie('username', '', time()-1, '/');
 setcookie('password', '', time()-1, '/');
 @session_destroy();
 echo 'Вы успешно вышли!';
 echo "<br><a href='index.php'>На главную</a>";
 } else {
  echo 'Для этого действия нужно авторизироваться.';
  echo "<br><a href='index.php'>На главную</a>";
 }
?>