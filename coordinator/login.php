<?php

/**
 * @author Assidi
 * @copyright 2016
 */

    session_start();
    require_once "../scripts/config.php";
    require_once "../scripts/functions.php";
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    if (login($login, $password)) {
        redirect("index.php");
    }
    else {
        redirect("../index.php");
    }

?>