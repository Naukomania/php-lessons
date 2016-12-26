<?php

    /**
 * @author Assidi
 * @copyright 2016
 */
 
    // Панель администратора
    
    session_start();
    require_once "../scripts/config.php";
    require_once "../scripts/functions.php";
    
    require_once "header.php";
    if (isAdmin()) { ?>
    
    <p>Здесь будет панель администратора.Мы успешно в нее зашли и даже успешно из нее вышли. 
    Осталось только ее написать</p>
    
    <p><a href="../index.php">Перейти на главную страницу сайта</a></p>
     
<?php
    } else {
        require_once "auth.php";
        }
    
    require_once "footer.php"; 

?>