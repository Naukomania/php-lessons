<?php
  // Имя пользователя и его пароль для аутентификации
  $username = 'Assidi';
  $password = 'Eiset';
  //зашифрованный пароль
  $password= "9c9a0399ecf98cca2ddaaa94abf80fa4";
  

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || (md5($_SERVER['PHP_AUTH_PW']) != $password)) {
    // Имя пользователя/пароль не действительны для отправки HTTP-заголовков, 
    // подтверждающий идентификацию 
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Гостевая книга"');
    exit('<h2>Гостевая книга</h2>Извините, вы должны ввести правильное имя пользователя и пароль, чтобы получить доступ к этой странице.');
  }
?>
