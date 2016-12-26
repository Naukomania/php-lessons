<?php

/**
 * @author Assidi
 * @copyright 2016
 */
 
 // добавление данных - фандома, персонажей и т.д.
    
    session_start();
    require_once "../scripts/config.php";
    require_once "../scripts/functions.php";
    $link = db_connect();
    require_once "header.php";
    if (isAdmin()) { ?>
    
    <p>Здесь можно будет добавить фандомы, персонажей и прочие данные в дополнительные таблицы</p>
    <p>У нас имеются следующие фандомы:</p>
    
    <?php
               
        // читаем столбец с названиями фандомов в одномерный массив
        $fandoms = get_column($link, "fandoms", "fandom-name");
        
        // а это двумерный массив - фандомы и их идентификаторы
        $fandoms_with_id = get_table($link, "fandoms");
        // выводим весь массив                     
        $n = count($fandoms);
            for ($i=0; $i<$n; $i++) {
                //print_r($fandoms[$i]['fandom-name']);
//                echo "<p></p>";
                echo "<p>".$fandoms[$i]."</p>";                
        }
        
        //print_r($fandoms_with_id);
        //echo "<p></p>";       
    ?> 
     
<!-- Форма для ввода нового фандома -->
    
 <form name="add-fandom" action="adddata.php" method="post">
        <div class="form-item">
            <label>Добавить фандом</label> <input class="form-input" type="text" name="fandom" />
        </div>        
        <div class="form-item">
            <input class="button" type="submit" name="addf" value="Добавить" />
        </div>
 </form>
<?php
    // если форма отправлена, обрабатываем 
    if (isset($_POST['fandom'])) {
        // проверяем, вдруг нахали кнопку, а данные не ввели 
        if ($_POST['fandom']=='') {
            echo '<div class="error">Не введено название фандома!</div>';
        }
        else {
            // все в порядке, обрабатываем форму
            $fandom = $_POST['fandom'];
            $result = add_row_to_simple_table($link, "fandoms", "fandom-name", $fandom);           
            
            if (!$result) {
                die("<p>Ошибка подключения к базе данных</p>");
            }
            else {
                echo "<p>Фандом добавлен</p>";
            }
        }
        
    } // конец обработки формы добавления фандома

?>

<p>У нас имеются следующие персонажи </p>

<table class="table-characters">

<?php
    
    // получили таблицу персонажей, отсортированную по фандомам
    $query = "SELECT * FROM  `characters` ORDER BY  `fandom-id` ,  `character-name`";
    $character_fandoms = run_query($link, $query);   
    
    
    $result = get_index($link, "characters", "character-id");
    echo "<p> Последняя вставленная запись ".$result."</p>";   
    
    $n = count ($character_fandoms);
    // цикл по таблице
    for ($i=0; $i<$n; $i++) {
        echo "<tr>";
        // имя персонажа
        $char_name = $character_fandoms[$i]['character-name'];
        // номер фандома в таблице фандомов
        $fand_id =  $character_fandoms[$i]['fandom-id'];
        // вытаскиваем по этому номеру строку из таблицы фандомов
        // это одномерный массив с ключами и значениями
        $arr =  get_row ($link, "fandoms", "fandom-id", $fand_id);
        // вытаскиваем из этой таблицы название фандома
        $fand_name = $arr['fandom-name']; 
        echo "<td>".$char_name."</td>";
        echo "<td>".$fand_name."</td>";        
        echo "</tr>";
    }    
    ?>  

</table>
<!-- Форма для ввода нового персонажа -->
<!-- Тут немного сложнее, потому что персонаж связан с определенным фандомом -->

 <form name="add-character" action="" method="post">
        <div class="form-item">
            <label>Добавить персонажа</label> <input class="form-input" type="text" name="character" />
            <select name="fandom-id[]">
                <option disabled>Выберите фандом</option>
                <?php
                    create_select_list($fandoms_with_id);
                ?>
            </select>
        </div>        
        <div class="form-item">
            <input class="button" type="submit" name="addc" value="Добавить" />
        </div>
 </form>
    <?php
    // если форма отправлена, обрабатываем 
    if (isset($_POST['character']) && isset($_POST['fandom-id'])) {
        // проверяем, не забыли ли ввести имя персонажа
         if ($_POST['character']=='') {
            echo '<div class="error">Не введено имя персонажа!</div>';
        }
        else {
            $fandom = $_POST['fandom-id'][0];
            $character = $_POST['character'];
            //экранируем и очищаем от лишних пробелов
            
            $character = trim($character);
            $character = mysqli_real_escape_string($link, $character);
            
            // формируем запрос
            $query = "INSERT INTO `characters` (`character-name`, `fandom-id`) VALUES ('".$character."', '".$fandom."')";
            
            // отправляем запрос
            $result = mysqli_query($link, $query);       
            
            if (!$result) {
                die("<p>Ошибка подключения к базе данных</p>");
            }
            else {
                echo "<p>Персонаж добавлен</p>";
                }                
            }                
        }
                
        ?>  
        <p>Теперь можно еще добавить жанры, бет и соавторов</p>
    <p>Имеются следующие жанры:</p>
    
    <?php
        // читаем столбец с названиями фандомов в одномерный массив
        $genres = get_column($link, "genre", "genre-name");        
        // выводим весь массив                     
        $n = count($genres);
            for ($i=0; $i<$n; $i++) {
                echo "<p>".$genres[$i]."</p>";                
        }       
    
    ?>
    
    <!-- Форма для ввода нового жанра -->
    
 <form name="add-genre" action="adddata.php" method="post">
        <div class="form-item">
            <label>Добавить жанр</label> <input class="form-input" type="text" name="genre" />
        </div>        
        <div class="form-item">
            <input class="button" type="submit" name="addg" value="Добавить" />
        </div>
 </form>
 
 <?php
    // если форма отправлена, обрабатываем 
    if (isset($_POST['genre'])) {
        // проверяем, вдруг нахали кнопку, а данные не ввели 
        if ($_POST['genre']=='') {
            echo '<div class="error">Не введено название жанра!</div>';
        }
        else {
            // все в порядке, обрабатываем форму
            $genre = $_POST['genre'];
            $result = add_row_to_simple_table($link, "genre", "genre-name", $genre);           
            
            if (!$result) {
                die("<p>Ошибка подключения к базе данных</p>");
            }
            else {
                echo "<p>Жанр добавлен</p>";
            }
        }
        
    } // конец обработки формы добавления жанра

?>
     <!-- Здесь добавляем в таблицу бет  -->
    
    <p>Имеющийся список бет:</p>
    
    <?php
        // читаем столбец с названиями фандомов в одномерный массив
        $beta = get_column($link, "beta", "beta-name");        
        // выводим весь массив                     
        $n = count($beta);
            for ($i=0; $i<$n; $i++) {
                echo "<p>".$beta[$i]."</p>";                
        }       
    
    ?>
    
    <!-- Форма для ввода новой беты -->
    
 <form name="add-beta" action="adddata.php" method="post">
        <div class="form-item">
            <label>Добавить бету</label> <input class="form-input" type="text" name="beta" />
        </div>        
        <div class="form-item">
            <input class="button" type="submit" name="addb" value="Добавить" />
        </div>
 </form>
 
 <?php
    // если форма отправлена, обрабатываем 
    if (isset($_POST['beta'])) {
        // проверяем, вдруг нажали кнопку, а данные не ввели 
        if ($_POST['beta']=='') {
            echo '<div class="error">Не введено имя беты!</div>';
        }
        else {
            // все в порядке, обрабатываем форму
            $beta = $_POST['beta'];
            $result = add_row_to_simple_table($link, "beta", "beta-name", $beta);           
            
            if (!$result) {
                die("<p>Ошибка подключения к базе данных</p>");
            }
            else {
                echo "<p>Бета добавлена</p>";
            }
        }
        
    } // конец обработки формы добавления беты
    ?>
    
     <!-- Здесь добавляем в таблицу соавторов  -->
    
    <p>Имеющийся список соавторов:</p>
    
    <?php
        // читаем столбец с названиями фандомов в одномерный массив
        $coauthor = get_column($link, "coauthor", "coauthor-name");        
        // выводим весь массив                     
        $n = count($coauthor);
            for ($i=0; $i<$n; $i++) {
                echo "<p>".$coauthor[$i]."</p>";                
        }       
    
    ?>
    
    <!-- Форма для ввода нового соавтора -->
    
 <form name="add-coauthor" action="adddata.php" method="post">
        <div class="form-item">
            <label>Добавить соавтора</label> <input class="form-input" type="text" name="coauthor" />
        </div>        
        <div class="form-item">
            <input class="button" type="submit" name="addco" value="Добавить" />
        </div>
 </form>
 
 <?php
    // если форма отправлена, обрабатываем 
    if (isset($_POST['coauthor'])) {
        // проверяем, вдруг нажали кнопку, а данные не ввели 
        if ($_POST['coauthor']=='') {
            echo '<div class="error">Не введено имя соавтора!</div>';
        }
        else {
            // все в порядке, обрабатываем форму
            $coauthor = $_POST['coauthor'];
            $result = add_row_to_simple_table($link, "coauthor", "coauthor-name", $coauthor);           
            
            if (!$result) {
                die("<p>Ошибка подключения к базе данных</p>");
            }
            else {
                echo "<p>Соавтор добавлен</p>";
            }
        }
        
    } // конец обработки формы добавления соавтора
    ?>    

<?php
    

    } else {
        require_once "auth.php";
        }
    
    require_once "footer.php"; 

    mysqli_close($link);

?>