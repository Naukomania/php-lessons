<?php

/**
 * @author Assidi
 * @copyright 2016
 */

    $email = $_POST[email];
    $email = trim($email);
    if($email=="") {
        echo "Вы не ввели электронный адрес!";
    }
    else {        
        
        // записываем электронный адрес в файл
        $file=fopen("emails.txt", "a");
        $str=$email."\n";
        if (fwrite($file, $str)) {
            echo "<p>Спасибо! Ваш электронный адрес записан! Как только будут новости, Вы получите сообщение по электронной почте.</p>";
        }
        else {
            echo "<p>Произошла ошибка, попробуйте еще раз</p>";
        }
        fclose($file);
    }
    echo '<a class="btn" href="index.php">На главную</a>';

?>

<!DOCTYPE HTML>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html">
    <title>Подтверждение отправки данных</title> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|PT+Sans+Narrow:400,700&subset=cyrillic,cyrillic-ext" rel="stylesheet">       
    <link href="css/reset.css" type="text/css" rel="stylesheet">
    <link href="css/style-sub.css" type="text/css" rel="stylesheet">    
</head>
<body>
    
</body>
</html>