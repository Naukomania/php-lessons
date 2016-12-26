<?php

/**
 * @author Assidi
 * @copyright 2016
 */

 // собственно, здесь данные, полученные от скрипта addtext, будут обрабатываться и записываться в базу
    
    session_start();
    require_once "../scripts/config.php";
    require_once "../scripts/functions.php";
    
    require_once "header.php";
    if (isAdmin()) { ?>
    
    <p>Сюда передаются данные, введенные в форму добавления текстов. И 
    с ним здесь занимаются различными извращениями.</p>
    
     <?php
        
        $link = db_connect();
        
            // теперь можно заниматься извращениями :) 
            // вытаскиваем переменные, которые нам нужны
            $fandom_id = $_SESSION['fandom_id'];
            $characters = $_POST['character-id'];
            
            $pairing = $_POST['char-pairing'];
            $pairing = trim($pairing);
            $pairing = mysqli_real_escape_string($link, $pairing);
            
            $beta = $_POST['beta-id'][0];
            $coauthor = $_POST['coauthor-id'][0];
            $genres = $_POST['genre'];
            $raiting = $_POST['raiting'];
            $category = $_POST['category'];
            
            $summary = $_POST['summary'];
            $summary = trim($summary);
            $summary = mysqli_real_escape_string($link, $summary);
            
            $dedication = $_POST['dedication']; 
            $dedication = trim($dedication);
            $dedication = mysqli_real_escape_string($link, $dedication);
            
            $note = $_POST['note']; 
            $note = trim($note);
            $note = mysqli_real_escape_string($link, $note);
            
            $title = $_POST['title'];
            $title = trim($title);
            $title = mysqli_real_escape_string($link, $title);
            
            
            $filename = $_POST['filename'];
            $filename = trim($filename);
            $filename = mysqli_real_escape_string($link, $filename);
            // а вдруг с таким именем файла фик уже есть? 
            $query = "SELECT * FROM `fanfics` WHERE `file-name` = '".$filename."'";
            $r = run_query($link, $query);
            // количество строк результата    
            $n = count($r);
            
            // файлов с похожими именами может быть больше одного, зная меня :) 
            while ($n>0) {
                $filename = $filename."1";
                // добавляем к имени единицу и смотрим, если ли имя с единицей
                $query = "SELECT * FROM `fanfics` WHERE `file-name` = '".$filename."'";
                $r = run_query($link, $query);                
                $n = count($r);
            }
    
            $alltext = $_POST['alltext'];            
            $date_text = $_POST['date-text'];
            $year = substr($date_text, 3);
            $month = substr($date_text, 0, 2);
            
            $date_public = time();
            $size = iconv_strlen(strip_tags($alltext), 'UTF-8');
            
            echo "Вас привествует обработчик формы!<br />";
            echo "Я получил следующие данные:<br />";
            echo "Идентификатор фандома ".$fandom_id."<br />";        
            echo "Персонажи ";
            print_r($characters);
            echo "<br />";
            echo "Персонажи и пейринг: ".$pairing."<br />";
            echo "Бета ".$beta."<br />";
            echo "Соавтор ".$coauthor."<br />";
            echo "Жанр ".$genres."<br />";
            echo "Рейтинг ".$raiting."<br />";
            echo "Категория ".$category."<br />";
            echo "Краткое содержание ".$summary."<br />";
            echo "Посвящение ".$dedication."<br />";
            echo "Примечание ".$note."<br />";
            echo "Заголовок ".$title."<br />";
            echo "Имя файла ".$filename."<br />";
            echo "Дата написания ".$date_text." Год ".$year." Месяц ".$month."<br />";
            echo "Дата публикации ".$date_public."<br />";
            echo "Примерный размер текста ".$size."<br />";
            echo "<p></p>";       
            
            
            // сейчас будем формировать запросы 
            // запись в основную таблицу с фанфиками 
            $query = "INSERT INTO `fanfics`(`file-name`, `title`, `year`, `month`,". 
            "`date-publish`, `raiting`, `pairing`, `summary`, `note`, `dedication`, `size`, `beta`, `coauthor`, `category`) VALUES ('".
            $filename."', '".$title."', '".$year."', '".$month."', '".$date_public."', '".
            $raiting."', '".$pairing."', '".$summary."', '".$note."', '".$dedication."', '".$size."', '".$beta."', '".$coauthor."', '".$category."')";
            
            echo "<p>".$query."</p>";
            $r = mysqli_query($link, $query);
            // определяем индекс только что добавленого фика
            $fanfic_id = get_index($link, "fanfics", "fic-id");
            echo "Номер фика: ".$fanfic_id."<br />";
            
                       
            // теперь нам надо разобраться с вспомогательными таблицами
                        
            // заносим в таблицу фанфиков на фандомам
            // пока не рассматриваем кроссоверы, с ними позже разберемся 
            $query = "INSERT INTO `fandoms-fanfics`(`fanfic-id`, `fandom-id`) VALUES ('".
            $fanfic_id."', '".$fandom_id."')";
            echo "<p>".$query."</p>";
            $r = mysqli_query($link, $query);
            
            // Теперь смотрим персонажи
            $n = count($characters); 
            // цикл по персонажам в массиве
            for ($i=0; $i<$n; $i++) {
                $char_id = $characters[$i];
                $query = "INSERT INTO `characters-fanfics`(`fanfic-id`, `character-id`) VALUES ('".
                $fanfic_id."', '".$char_id."')";
                echo "<p>".$query."</p>";
                $r = mysqli_query($link, $query);
            }
            
            // То же самое с жанрами
            $n = count($genres); 
            // цикл по персонажам в массиве
            for ($i=0; $i<$n; $i++) {
                $genre = $genres[$i];
                $query = "INSERT INTO `genre-fanfic`(`fanfic-id`, `genre-id`) VALUES ('".
                $fanfic_id."', '".$genre."')";
                echo "<p>".$query."</p>";
                $r = mysqli_query($link, $query);
            }
             
            // Это все работает, теперь самое страшное 
            // надо создать файл 
            //запишем это в функцию
             
             
            $pagecontent = create_text_file($fanfic_id, $alltext);
            $filename = $filename.".php";
            chdir("../texts");
            file_put_contents($filename, $pagecontent);
            
            echo "Файл создан<br />";
            unset($_SESSION['fandom_id']);
            
        
            
     ?>
     
<?php
    } else {
        require_once "auth.php";
        }
    
    require_once "footer.php"; 
    mysqli_close($link);
?>