<?php

    $raitings = array("G", "PG", "PG-13", "R", "NC-17");
    $categories = array("Джен", "Гет", "Слэш", "Фемслэш");

/**
 * @author Assidi
 * @copyright 2016
 */

// здесь находятся все функции
    
    // функция проверяет,вошел ли пользователь под логином администратора 
    function isAdmin($login = false, $password = false) {
		if (!$login) $login = isset($_SESSION["login"])? $_SESSION["login"] : false;
		if (!$password) $password = isset($_SESSION["password"])? $_SESSION["password"] : false;
		return mb_strtolower($login) === mb_strtolower(ADM_LOGIN) && $password === ADM_PASSWORD;
	}
    
    // функция для регистрации 
     function login($login, $password) {
		$password = md5($password);
		if (isAdmin($login, $password)) {
			$_SESSION["login"] = $login;
			$_SESSION["password"] = $password;
			return true;
		}
		return false;
	}
    
    // функция для разлогинивания
    function logout() {
        unset($_SESSION["login"]);
    }
    
    // функция для переадресации
     function redirect($link) {
        header("Location: $link");
        exit;
    }
    
    // функция для соединения с базой данных
    
    function db_connect(){        
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die("Error: что-то там не то ".mysqli_error($link));
        if(!mysqli_set_charset($link, "utf8")){
            printf("Error: ".mysqli_error($link));
        }
        return $link;
    }
    
    // Функция для выполнения запроса к базе данных
    // возвращает массив результата
    
    function run_query($link, $query) {  
        //echo $query."<br />";
        $res = mysqli_query($link, $query);    
        if(!$res)
            die(mysqli_error($link));        
        //Извлечение из БД
    
        $n=mysqli_num_rows($res);
        $result=array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($res);
            $result[$i] = $row;
        }
    
        return $result;
    }
    
    // Функция для получения одной колонки таблицы
    function get_column($link, $table, $column) {
        $query = "SELECT `".$column."` FROM `".$table."`";
        $res = mysqli_query($link, $query);    
        if(!$res)
            die(mysqli_error($link));        
        //Извлечение из БД
    
        $n=mysqli_num_rows($res);
        $result=array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($res);
            $result[$i] = $row[$column];
        }        
        return $result;
    }
    
    // функция получает всю таблицу из записывает ее в массив
    function get_table($link, $table) {
        $query = "SELECT * FROM `".$table."`";
        $result = run_query($link, $query);
        return $result;
    }
    
    // функция добавляет запись в таблицу из двух столбцов
    // один - ключ, он автоматически добавляется, его не трогаем
    // передается имя 
    function add_row_to_simple_table($link, $table, $name, $value) {
        $query = "INSERT INTO `".$table."` (`".$name."`) VALUES ('".$value."')";  
        $result = mysqli_query($link, $query);        
        return $result;
    } 
    
    // функция читает ряд таблицы, по идентификатору $name со значением $value
    // подразумевается, что выбор идет по уникльному ключу, поэтому возвращается одномерный массив 
    function get_row ($link, $table, $name, $value) {
        $query = "SELECT * FROM `".$table."` WHERE `".$name."` = '".$value."'";        
        $result = run_query($link, $query);
        $result = $result[0];
        return $result;
    }
    
    // функция создает список select 
    // передается двумерный массив, каждый элемент - ряд простой таблицы из двух столбцов
    // идентификатор и значение  
    function create_select_list($array) {
        $n = count($array);
        // цикл по элементам массива
        for ($i = 0; $i < $n; $i++) {
            // берем элемент массива - это массив из двух элементов 
            // и выбираем из него только значения
            $arr = array_values($array[$i]);
            // сначала идет индекс элемента - это значение для списка
            $value = $arr[0];
            // потом иназвание - это текст для списка 
            $text = $arr[1];
            echo '<option value="'.$value.'">'.$text.'</option>';
        }
        
    }
    //функция получает двумерный массив, состоящий из массивчиков идентификатор - имя
    // по конкретному идентификатору выдает имя 
    function name_by_id($array, $id) {
        $n = count($array);
        // цикл по элементам массива
        for ($i = 0; $i < $n; $i++) {
            // берем элемент массива - это массив из двух элементов 
            // и выбираем из него только значения
            $arr = array_values($array[$i]);
            // Сначала идет идентификатор, потом значение
            // сравниваем идентификаторые            
            if ($arr[0] == $id) {
                // индекс совпадает. забираем значени и выходим из цикла
                $result = $arr[1];
                break;
            }
            
        }            
        return $result;
    }
    
    // функция создает массив персонажей из заданного фандома 
    // массив двумерный - для создания списка  
    function character_from_fandom($link, $fandom_id) {
        $query = "SELECT `character-id`, `character-name` FROM `characters` WHERE `fandom-id` = '".
        $fandom_id."' ORDER BY `character-name`";
        $result = run_query($link, $query);
        return $result;
    }
    
    // функция создает чекбокс-лист из массива (двумерного, пары ид - значение )    
    // передается сам массив и его название
    function create_checkbox_list($array, $name) {
         $n = count($array);
        // цикл по элементам массива
        for ($i = 0; $i < $n; $i++) {
            // берем элемент массива - это массив из двух элементов 
            // и выбираем из него только значения
            $arr = array_values($array[$i]);
            // сначала идет индекс элемента - это значение для списка
            $value = $arr[0];
            // потом иназвание - это текст для списка 
            $text = $arr[1];
            //<input type="checkbox" name="option5" value="a5">X3-DOS</p>
            echo '<input type="checkbox" name="'.$name.'[]" value="'.$value.'">'.$text.'<br />';
        }
    }
    
    // функция создает радиокнопки
    // передается одномерный массив - сам массив и его название 
    function create_radio_list ($array, $name) {
        $n = count($array);
        // цикл по элементам массива
        for ($i = 0; $i < $n; $i++) {
            //<input name="dzen" type="radio" value="dzen"> Дзен</p>
            $text = $array[$i];
            echo '<input type="radio" name="'.$name.'" value="'.$text.'">'.$text.'<br />';
            
        }
    }
    
    // определяет наибольщее значение поля $id в таблице
    // $id - первичный ключ с автоувеличением, то есть опреляем последнюю добавленную запись
    function get_index($link, $table, $id) {
        $query = "SELECT `".$id."` FROM `".$table."` ORDER BY `".$id."` DESC LIMIT 1";
        $result = run_query($link, $query);        
        $index = $result[0][$id];
        return $index;
    }
    
    // получает значение мясяца по его номеру
    function get_month($month) {
        $array = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
        // индексы массива начинаются с нуля
        $n = $month - 1;    
        $result = $array[$n];
        return $result;
    }
    
    // получает имя беты по ее идентификатору в таблице
    function get_beta_name($link, $beta_id) {
        $query = "SELECT `beta-name` FROM `beta` WHERE `beta-id`='".$beta_id."'";
        $result = run_query($link, $query);        
        $name = $result[0]['beta-name'];
        return $name;
    }
    
    // то же самое с соавтором
    function get_coauthor_name($link, $coauthor_id) {
        $query = "SELECT `coauthor-name` FROM `coauthor` WHERE `coauthor-id`='".$coauthor_id."'";        
        $result = run_query($link, $query);
        $name = $result[0]['coauthor-name'];
        return $name;
    }
    
    // по идентификатору фандома выдает его название
    function fandom_name($link, $fandom_id) {        
        $query = "SELECT `fandom-name` FROM `fandoms` WHERE `fandom-id`='".$fandom_id."'";        
        $result = run_query($link, $query);        
        $name = $result[0]['fandom-name'];
        return $name;
    }
    
    // по идентификатору жанра выдает его названи я
    function genre_name($link, $genre_id) {
        $query = "SELECT `genre-name` FROM `genre` WHERE `genre-id`='".$genre_id."'";
        $result = run_query($link, $query);        
        $name = $result[0]['genre-name'];
        return $name;
    }
    
    // по идентификатору перонажа выдает его имя 
    function character_name($link, $character_id) {        
        $query = "SELECT `character-name` FROM `characters` WHERE `character-id`='".$character_id."'";        
        $result = run_query($link, $query);        
        $name = $result[0]['character-name'];
        return $name;
    }
    
    
    // функция получает идентификатор фанфика и выдает строку фандомов со ссылкой
    // на страницу поиска
    function get_fandom($link, $fanfic_id) {
        //ищем в таблице фанфиков по фандомам номер фанфика и соответствующие ему фандомы   
        $query = "SELECT `fandom-id` FROM `fandoms-fanfics` WHERE `fanfic-id` = '".$fanfic_id."'";        
        // получаем массив результата 
        $array = run_query($link, $query);
        //Итог будем записывать в строку
        $str = "";
        $n = count($array);
        // цикл по элементам массива
        for ($i = 0; $i<$n; $i++) {
            $id = $array[$i]['fandom-id'];
            $name = fandom_name($link, $id);  
            $ref = "search.php?fandom-id=".$id;
            // проверяем, не надо ли добавить переход в верхний каталог 
            $ref = get_prefix().$ref;                     
            $str = $str.'<a class="a-inline" href="'.$ref.'">'.$name."</a>, ";
        }
        // в конце цикла образовалась лишняя запятая и пробел        
        $l = strlen($str);         
        $str = substr($str, 0, $l-2);        
        return $str;
    }    
    
    // то же самое с жанрами
    // по идентификатору фанфика выдает строку с жанрами с адресом для поиска
        function get_genre($link, $fanfic_id) {
        //ищем в таблице фанфиков по жанрам номер фанфика и соответствующие ему жанры   
        $query = "SELECT `genre-id` FROM `genre-fanfic` WHERE `fanfic-id` = '".$fanfic_id."'";        
        // получаем массив результата 
        $array = run_query($link, $query);
        //Итог будем записывать в строку
        $str = "";
        $n = count($array);
        // цикл по элементам массива
        for ($i = 0; $i<$n; $i++) {
            $id = $array[$i]['genre-id'];
            $name = genre_name($link, $id);  
            $ref = "search.php?genre-id=".$id;
            // проверяем, не надо ли добавить переход в верхний каталог 
            $ref = get_prefix().$ref;                     
            $str = $str.'<a class="a-inline" href="'.$ref.'">'.$name."</a>, ";
        }
        // в конце цикла образовалась лишняя запятая и пробел        
        $l = strlen($str);         
        $str = substr($str, 0, $l-2);        
        return $str;
    } 
    
    // функция определяет, в каком мы каталоге - корневом или текстовом
    function get_prefix() {
        $result = "";
        $address = getcwd();
        $l = strlen($address);
        $str = substr($address, $l-5);        
        if ($str = "texts") {
            $result = "../";
        }
        return $result;
    }
    
    // функция выводит краткую информацию о фанфике для списка фанфиков
    function fanfic_shot_info($link, $row) {
        //извлекаем имя файла и прибавляем к нему расширение и путь
        $filename = $row['file-name'].".php";
        $filename = "texts/".$filename;
        $title = $row['title'];
        $fanfic_id = $row['fic-id'];
        // собираем строку с фандомами, со ссылками для поиска
        $fandoms = get_fandom($link, $fanfic_id);
        // то же с жанрами                    
        $genre = get_genre($link, $fanfic_id);                    
        $summary = $row['summary'];                    
        $pairing = $row['pairing'];
        $size = $row['size'];
        $size = $size/1000;
        $size = floor($size);
        if ($size==0) $size=1;
        ?>
            <div class="about-text">
                <p><a class="title" href="<?= $filename?>"><?= $title?></a></p>
                <p><span class="bold">Фандом: </span><?= $fandoms?></p>
                <p><span class="bold">Персонажи: </span><?= $pairing?></p>
                <p><span class="bold">Жанр: </span><?= $genre?></p>
                <p><?= $summary?></p>
                <p><span class="bold">Размер: </span><?= $size?>К</p>
            </div>
            <?php
    }
    
    // функция создает содержимое файла файл с текстом фанфика 
    // передаются идентификатор фанфика и сам текст
    // запись в файл производится там, где вызывается функция
     function create_text_file($fanfic_id, $alltext) {        
        $pagecontent = "<?php\nsession_start();\nrequire_once \"../scripts/config.php\";\n";
        $pagecontent = $pagecontent."require_once \"../scripts/functions.php\";\n";
        $pagecontent = $pagecontent.'$text_id ='.$fanfic_id.";\n";
        $pagecontent = $pagecontent.'$text_title = get_title($text_id);'."\n";
        $pagecontent = $pagecontent."?>\n<!DOCTYPE HTML>\n<html>\n<?php\nrequire_once \"../models/head.php\";\n?>\n";
        $pagecontent = $pagecontent."<div class=\"container\">\n<?php\nrequire_once \"../models/header.php\";?>\n";
        $pagecontent = $pagecontent."<div class=\"main-content\">\n".'<h1><?php echo $text_title;?></h1>'."\n";
        $pagecontent = $pagecontent.'<?php require_once "../models/fanfic-info.php"; ?>'."\n";
        $pagecontent = $pagecontent."<?php if (isAdmin()) { require_once \"../models/fanfic-admin.php\"; } ?>\n";
        $pagecontent = $pagecontent.$alltext."\n";
        $pagecontent = $pagecontent."</div>\n<div class=\"comments-main\">\n";
        $pagecontent = $pagecontent."<?php require_once \"../models/comments.php\"; ?>\n";
        $pagecontent = $pagecontent."</div>\n<?php require_once \"../models/footer.php\"; ?>\n";
        $pagecontent = $pagecontent."</div>\n</body>\n</html>";
        return $pagecontent;
     }
    
    // функция опредяет заголовок фика по его индексу
    // будет использоваться внутри файла с текстом фанфика,
    // поэтому соединяется с базой внутрии нее и тут же отсоединяется
    function get_title($fanfic_id) {
        // сначала соединяемся с базой
        $link = db_connect();  
        // читаем из базы информацию о фанфике
        $row = get_row($link, "fanfics", "fic-id", $fanfic_id);
        $title = $row['title'];
        mysqli_close($link); 
        return $title;
    }
?>   