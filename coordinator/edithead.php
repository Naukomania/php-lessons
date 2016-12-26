<?php

    /**
 * @author Assidi
 * @copyright 2016
 */
 
    // Панель администратора
    
    session_start();
    require_once "../scripts/config.php";
    require_once "../scripts/functions.php";
    $link = db_connect();
    require_once "header.php";
    if (isAdmin()) { ?>
    
    <p>Здесь можно отредактировать шапку фанфика</p>
    
    <?php        
        $fanfic_id = $_GET['fanfic_id'];
        echo "<p>Номер фанфика ".$fanfic_id."</p>";
        // читаем из базы информацию о фанфике
        $text_info = get_row($link, "fanfics", "fic-id", $fanfic_id);
        print_r($text_info);
        echo "<p></p>";
        $title = $text_info['title'];        
        $summary = $text_info['summary'];
        $pairing = $text_info['pairing'];
        $note = $text_info['note'];
        $dedication = $text_info['dedication'];
        $filename = $text_info['file-name'];
        $filename = "../texts/".$filename.".php";
     ?>
     <form name="edithead" action=""  method="post">   
        <div class="form-item">
            <label for="title">Название фика</label>
             <input class="form-input" type="text" value="<?= $title?>" name="title">
        </div> 
             
        <div class="form-item">
            <label for="char-pairing">Персонажи/Пейринг</label>
             <input class="form-input" type="text" value="<?= $pairing?>" name="char-pairing">
        </div> 
        <div class="form-item">
            <label for="summary">Краткое содержание<br /></label>
            <textarea class="form-item form-input" name="summary" rows="10" cols="20"><?= $summary?></textarea>
        </div>
        
        <div class="form-item">
            <label for="dedication">Посвящение<br /></label>
            <textarea class="form-item form-input" name="dedication" rows="10" cols="20"><?= $note?></textarea>
        </div>
        
        <div class="form-item">
            <label for="note">Примечание<br /></label>
            <textarea class="form-item form-input" name="note" rows="10" cols="20"><?= $dedication?></textarea>
        </div>
        
        <div class="form-item">
            <input class="button" type="submit" name="edith" value="Изменить" />
        </div>
     </form>
<?php
       // если форма отправлена, обрабатываем 
       if (isset($_POST['edith'])) {
            print_r($_POST);
            echo "<p></p>";
            // читаем данные из массива $_POST 
            $title = $_POST['title'];
            $title = trim($title);
            $title = mysqli_real_escape_string($link, $title);
            
            $pairing = $_POST['char-pairing'];
            $pairing = trim($pairing);
            $pairing = mysqli_real_escape_string($link, $pairing);
            
            $summary = $_POST['summary'];
            $summary = trim($summary);
            $summary = mysqli_real_escape_string($link, $summary);
            
            $dedication = $_POST['dedication']; 
            $dedication = trim($dedication);
            $dedication = mysqli_real_escape_string($link, $dedication);
            
            $note = $_POST['note']; 
            $note = trim($note);
            $note = mysqli_real_escape_string($link, $note);
            
            $query = "UPDATE `fanfics` SET `title`='$title', `summary`='$summary',`note`='$note',".
            "`pairing`='$pairing', `dedication`='$dedication' WHERE `fic-id`= '$fanfic_id'";
            echo "<p>".$query."</p>";
            $r = mysqli_query($link, $query);
            echo "<p>Изменения внесены</p>";            
       } 
?>
        <p><a class="a-inline" href="<?= $filename?>">Вернуться к фанфику</a></p>
<?php

    } else {
        require_once "auth.php";
        }
    
    require_once "footer.php";
    mysqli_close($link); 

?>