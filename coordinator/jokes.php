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
    
    <p>Здесь можно добавить анекдоты и маразмопись в базу приколов. Под это заведена отдельная страница, чтобы не захламлять таблицу с данными</p>
    <p>У нас имеются следующие приколы:</p>
    
    <?php
               
        // читаем столбец с текстами приколов в одномерный массив
        $jokes = get_column($link, "jokes", "joke-text");        
        
        // выводим весь массив                     
        $n = count($jokes);
            for ($i=0; $i<$n; $i++) {  
                $joke = $jokes[$i];
                $joke = preg_replace('/[\r\n]+/', "<br />", $joke);
                echo "<p>".$joke."</p>";                
        }        
        
    ?> 
     
<!-- Форма для ввода нового прикола -->
    
 <form name="add-joke" action="" method="post">
        <div class="form-item">
            <p><label for="joke">Добавить прикол</label></p> 
            <textarea class="form-item text-input" name="joke" rows="20" cols="20"></textarea>
        </div>        
        <div class="form-item">
            <input class="button" type="submit" name="addj" value="Добавить" />
        </div>
 </form>
<?php
    // если форма отправлена, обрабатываем 
    if (isset($_POST['joke'])) {
        // проверяем, вдруг нахали кнопку, а данные не ввели 
        if ($_POST['joke']=='') {
            echo '<div class="error">Не введен текст прикола!</div>';
        }
        else {
            // все в порядке, обрабатываем форму
            $joke = $_POST['joke'];
            $joke = trim($joke);
            $joke = mysqli_real_escape_string($link, $joke);            
            $result = add_row_to_simple_table($link, "jokes", "joke-text", $joke);           
            
            if (!$result) {
                die("<p>Ошибка подключения к базе данных</p>");
            }
            else {
                echo "<p>Прикол добавлен</p>";
            }
        }
        
    } // конец обработки формы добавления фандома

?>


<?php
    

    } else {
        require_once "auth.php";
        }
    
    require_once "footer.php"; 

    mysqli_close($link);

?>