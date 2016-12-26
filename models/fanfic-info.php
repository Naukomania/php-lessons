<div class="full-text-head">
    <?php
    // формирование шапки фанфика на странице с текстом
    // вставляется в файл с текстом, в котором уже определна переменная $text_id
     
        // вытаскиваем из базы строку с нужным идентификатором текста
        $text_info = get_row($link, "fanfics", "fic-id", $text_id);
            
        //print_r($text_info);
        //echo "<p></p>";
        // собираем строку с фандомами, со ссылками для поиска
        $fandoms = get_fandom($link, $text_id);
        // то же с жанрами
        $genre = get_genre($link, $text_id);
        // достаем из строки саммари и пейринг
        $summary = $text_info['summary'];
        $pairing = $text_info['pairing'];
        
        //Есть ли у фанфика бета и соавтор? 
        // если есть, эти переменные больше нуля
        $beta_id = $text_info['beta'];
        $coauthor_id = $text_info['coauthor'];
        
        // дата написания фанфика
        $year = $text_info['year'];
        $month = $text_info['month'];
        // переводим числовое значение месяца в текстовое
        $month = get_month($month);
        $date = $month.", ".$year;
        $raiting = $text_info['raiting'];
        $category = $text_info['category'];
        $note = $text_info['note'];
        $dedication = $text_info['dedication'];
        
    ?>    
    
    <?php
        // если бета есть, пишем имя, если нет - не пишем
        if ($beta_id>0) {
            $beta_name = get_beta_name($link, $beta_id);
            ?>  
                <p><span class="bold">Бета: </span><?= $beta_name?></p>
            <?php          
        }
    ?>
    <?php
        // то же самое с соавтором
        if ($coauthor_id>0) {
            $coauthor_name = get_coauthor_name($link, $coauthor_id);
            ?>  
                <p><span class="bold">Соавтор: </span><?= $coauthor_name?></p>
            <?php          
        }
    ?>
    <p><span class="bold">Фандом: </span><?= $fandoms?></p>
    <p><span class="bold">Персонажи: </span><?= $pairing?></p>
    <p><span class="bold">Рейтинг: </span><?= $raiting?></p>
    <p><span class="bold">Категория: </span><?= $category?></p>
    <p><span class="bold">Жанр: </span><?= $genre?></p>
    <?php 
        if ($note !="") {
            ?>  
                <p><span class="bold">Примечание: </span><?= $note?></p>
            <?php 
        }
    ?>
    <?php 
        if ($dedication !="") {
            ?>  
                <p><span class="bold">Посвящение: </span><?= $dedication?></p>
            <?php 
        }
    ?>
    <p><span class="bold">Написано: </span><?= $date?></p>        
    <p><?= $summary?></p>
    
</div>