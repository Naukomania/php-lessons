<?php

/**
 * @author Assidi
 * @copyright 2016
 */

    session_start(); //стартуем сессию, иначе будет ошибка при попытке разрушить
    require_once "../scripts/config.php";
    require_once "../scripts/functions.php";
	session_destroy(); //разрушаем сессию для пользователя
    redirect("../index.php");

?>