<!DOCTYPE html>
<html lang="ru">
<head>
  
  <title>Панель администратора</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|PT+Sans+Narrow:400,700&subset=cyrillic,cyrillic-ext" rel="stylesheet">       
    <link href="../css/reset.css" type="text/css" rel="stylesheet">
    <link href="../css/style-admin.css" type="text/css" rel="stylesheet">  
</head>
<body>
<?php if (isAdmin()) { ?>
<div class="menu">
    <a href="logout.php">Выход</a>
    <a href="/coordinator">Главная</a>
    <a href="/coordinator/adddata.php">Добавить данные</a>
    <a href="/coordinator/jokes.php">Приколы</a>        
    <a href="/coordinator/addtext.php">Добавить текст</a>
    <a href="/coordinator/comments-admin.php">Комментарии</a>
</div>

<h1>Панель администратора</h1>
<?php } ?>