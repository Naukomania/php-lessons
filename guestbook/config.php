<?php

/**
 * Файл конфигурации для гостевой книги
 * @author Assidi
 * @copyright 2016
 */
   // Имя файла с базой сообщений
   define("BASE", "base.txt");    
    // Символы-разделители
    define("SYMBOL", "^^^^");
    define("DELIMITER", "===========================");
    
    // параметры для капчи
    define('CAPTCHA_NYMCHARS', 6);
    define('CAPTCHA_WIDTH', 100);
    define('CAPTCHA_HEIGHT', 30);
    
    //число записей на странице
    define('ARTICLE_PER_PAGE', 10);
    
    date_default_timezone_set('Europe/Moscow');
?>