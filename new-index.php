<?php
// подключить библиотеки, которые везде используются
// например, подключить объект приложения
  // конфиги
  // старт сессии
  // автозагрузка
require_once "scripts/config.php";
require_once "scripts/functions.php";

// работа с контроллером
// принимаем параметры
// по параметрам запрашиваем данные у моделей
$link = db_connect();
require_once 'model/Fanfic.php';
$arFanfic = Fanfic::getList($link);
$fanficCount = count($arFanfic);

// передаём данные в представление
include 'views/new-index.php';