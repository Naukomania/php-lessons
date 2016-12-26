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
    
    <p>Здесь можно отредактировать текст фанфика</p>
    
    <?php        
        $fanfic_id = $_GET['fanfic_id'];
        echo "<p>Номер фанфика ".$fanfic_id."</p>";
        // читаем из базы информацию о фанфике
        $row = get_row($link, "fanfics", "fic-id", $fanfic_id);
        print_r($row);
        echo "<p></p>";
        $filename = $row['file-name'];
        $filename = $filename.".php";
        chdir("../texts");
        $allfile = file_get_contents($filename);
        $n1 = strpos($allfile, 'admin.php"; } ?>');
        $n1 = $n1 + 16; 
        $n2 = strpos($allfile, '<div class="comments-main">');
        $alltext = substr($allfile, $n1, $n2-$n1-10);
     ?>
     
     <form name="edittext" action=""  method="post"> 
        <div class="form-item">
            <label for="summary">Техт фика<br /></label>
            <textarea class="form-item form-input text-input" name="alltext" rows="30" ><?= $alltext?></textarea>
        </div>
        <div class="form-item">
            <input class="button" type="submit" name="editt" value="Изменить" />
        </div>
     </form>
     
<?php
    // если форма отправлена, обрабатываем 
       if (isset($_POST['editt'])) {
            //print_r($_POST);
            //echo "<p></p>";
            $text = $_POST['alltext'];
            //echo "<p>Фанфик номер ".$fanfic_id."</p>";
            $pagecontent = create_text_file($fanfic_id, $text);
            file_put_contents($filename, $pagecontent);
            echo "Файл изменен<br />";            
        }
  ?>
        <p><a class="a-inline" href="<?= "../texts/".$filename?>">Вернуться к фанфику</a></p>
<?php      

    } else {
        require_once "auth.php";
        }
    
    require_once "footer.php";
    mysqli_close($link); 

?>