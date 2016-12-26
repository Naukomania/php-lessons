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
    
    <?php
      // если форма отправлена, обрабатываем
        if (isset($_POST['editf'])) {            
            $fandom2_id = $_SESSION['fandom_id'];
            $characters = $_POST['character-id'];
            $fanfic_id = $_GET['fanfic_id'];
            echo "<p>Номер фанфика ".$fanfic_id."</p>";
            echo "<p> Идентификатор второго фандома: ".$fandom2_id."</p>";
            print_r($characters);
            echo "<p></p>";
            // теперь можно составлять запросы для добавления в базу
            // добавляем соотвествие фандома и фанфика 
            $query = "INSERT INTO `fandoms-fanfics`(`fanfic-id`, `fandom-id`) VALUES ('".
            $fanfic_id."', '".$fandom2_id."')";
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
            
            echo "<p>Фандом и персонажи добавлены</p>";          
        }
        
      
      ?>
    
    <p>Здесь можно добавить фандомы и персонажей</p>
    
    <?php
        $fanfic_id = $_GET['fanfic_id'];
        echo "<p>Номер фанфика ".$fanfic_id."</p>";
        // читаем из базы информацию о фанфике
        $text_info = get_row($link, "fanfics", "fic-id", $fanfic_id);
        //print_r($text_info);
        $filename = $text_info['file-name'];
        $filename = "../texts/".$filename.".php";
        //echo "<p></p>";
        // Теперь надо выяснить, какие фандомы и пероснажи у фанфика уже есть
        $query = "SELECT `fandom-id` FROM `fandoms-fanfics` WHERE `fanfic-id` = '".$fanfic_id."'";        
        // получаем массив результата 
        $fandoms = run_query($link, $query);
        echo "<p>Получили массив с фандомами</p>";
        $n = count($fandoms);
        // цикл по элементам массива
        for ($i = 0; $i<$n; $i++) {
            $id = $fandoms[$i]['fandom-id'];
            $name = fandom_name($link, $id);
            echo "<p>".$name."</p>";            
        }        
       
        echo "<p>И с персонажами</p>";
        $query = "SELECT `character-id` FROM `characters-fanfics` WHERE `fanfic-id` = '".$fanfic_id."'";
        $characters = run_query($link, $query);
        
        $n = count($characters);
        for ($i = 0; $i<$n; $i++) {
            $id = $characters[$i]['character-id'];
            $name = character_name($link, $id);
            echo "<p>".$name."</p>";    
        }        
       
       $fandoms_with_id = get_table($link, "fandoms");  
       // А вот теперь будет форма 
       
     ?>
     
     <form name="addfand" action=""  method="post">
        
        <select name="fandom-id[]" onChange='document.forms["addfand"].submit();'>
        
                <option value='<?   if($_POST['fandom-id'][0]!=''){
                    $fand_name = name_by_id($fandoms_with_id, $_POST['fandom-id'][0]);
                    echo $fand_name;
                    }?>'><?   if($_POST['fandom-id'][0]!=''){ echo $fand_name;}?></option>
                <?php
                    create_select_list($fandoms_with_id);
                ?>
        </select>
         </form>
         <p></p>
          <form name="editfandoms" action=""  method="post">        
            <select multiple name="character-id[]">
                    <option value="0">Выберите персонажа</option>
                    <?php
                        $fandom2_id = $_POST['fandom-id'][0];
                        $_SESSION['fandom_id'] = $fandom2_id;             
                        // получаем персонажей по идентификатры фандома       
                        $character = character_from_fandom($link, $fandom2_id);
                        //создаем список выбора select
                        create_select_list($character);
                    ?>
            </select>        
            <div class="form-item">
                <input class="button" type="submit" name="editf" value="Добавить" />
            </div>
         </form>
        
      

        <p><a class="a-inline" href="<?= $filename?>">Вернуться к фанфику</a></p>
<?php

    } else {
        require_once "auth.php";
        }
    
    require_once "footer.php";
    mysqli_close($link); 

?>