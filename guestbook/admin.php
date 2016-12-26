<?php
  require_once('authorize.php');
  require_once "config.php";
  require_once "functions.php";
  // есть ли у нас номер записи на удаление? 
  if (isset($_GET['index'])) {
    $i = $_GET['index'];
    $articles = get_all_articles ();  
    //echo '<div class="debug-window">';
    //echo 'номер записи '.$i.'<br />';
    //echo 'сама запись'.$articles[$i].'<br />';
    //echo '</div>';
    // удаляем запись из массива
    $articles = delete_element($articles, $i);
   //записываем получившийся массив в файл
    $result=save_all_articles ($articles);
    echo '<div class="debug-window">';
    if ($result) {
        echo 'Запись удалена';    
    }
    else {
        echo 'Ошибка записи';
    }
    echo '</div>';
        
  }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  
  <title>Гостевая книга. Панель администратора</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|PT+Sans+Narrow:400,700&subset=cyrillic,cyrillic-ext" rel="stylesheet">       
    <link href="../css/reset.css" type="text/css" rel="stylesheet">
    <link href="../css/style-quest.css" type="text/css" rel="stylesheet">  
</head>
<body>
    <div class="container">
        <header>
            <a href="../index.php">На главную</a>
            <a href="index.php">В гостевую</a>
        </header>
        
        <h1>Гостевая книга. Панель администратора</h1>
        <p class="p-head">Мы успешно в нее вошли. Теперь нам надо успешно ее написать. 
        И не менее успешно выйти</p>
        
        
        <?php
        $articles = get_all_articles ();       
        $n_articles = count($articles);
        
        for ($i=$n_articles-1; $i>=0; $i--) {
            $a = $articles[$i];
                //разбираем запись на составляющие
                $message = get_message($a);
                //убираем пробелы и лишние знаки
                $message = check_mess($message);
                $date = $message['date'];
                $name = $message['name'];
                $email = $message['email'];
                $mess = $message['message'];
                ?>                
                
                <article class="note-admin">
                    <p>Имя: <?=$name?></p>
                    <p>Дата: <?=$date?></p>
                    <p><?=$mess?></p> 
                    <a class="button-quest" href="admin.php?index=<?=$i?>">Удалить</a>
                </article>
                
                <?php
        } // конец цикла по записям
        
       
    ?>
        
    </div>
  
    
  


</body> 
</html>