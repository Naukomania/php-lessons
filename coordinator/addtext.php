<?php

/**
 * @author Assidi
 * @copyright 2016
 */

 // добавление текстов
    
    session_start();
    require_once "../scripts/config.php";
    require_once "../scripts/functions.php";
    
    require_once "header.php";
    if (isAdmin()) { ?>
    
    <p>Здесь можно будет добавить текст</p>
    <p>Первым делом надо создать базу данных текстов. В самой таблице храним название текста, 
    название файла, дату написания, дату помещения в архив, примечания и посвящения. Ах да, 
    еще рейтинг. Это вся связь один к одному.</p>
    <p>Отдельные таблицы должны быть для фанфиков по фандомам и персонажам, так как могут быть
    кроссоверы. Так же для бет и соавторов отдельные таблицы.</p>
    
    
    <?php
    
    // готовим переменные для вывода форм    
       $link = db_connect();      
        // читаем столбец с названиями фандомов в одномерный массив         
        $fandoms = get_column($link, "fandoms", "fandom-name");
        
        // а это двумерный массив с названиями фандомов и их индексами
        $fandoms_with_id = get_table($link, "fandoms");        
       
        $genre = get_table($link, "genre");
        // рейтинги и категории уже забиты в массивы. хранить их в базе необязательно
        $beta = get_table($link, "beta");
        $coauthor = get_table($link, "coauthor");
        
    ?>
    <p>Сейчас будет смертельный номер - передирание примера о двух зависящих
        друг от друга селектах. Но сначала надо функцию выбора персонажей 
        одного фандома написать </p>
        
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
         <p></p>   
         </form>
          <form name="addtext" action="storetext.php"  method="post">        
        <select multiple name="character-id[]">
                <option value="0">Выберите персонажа</option>
                <?php
                    $fandom_id = $_POST['fandom-id'][0];
                    $_SESSION['fandom_id'] = $fandom_id;             
                    // получаем персонажей по идентификатры фандома       
                    $character = character_from_fandom($link, $fandom_id);
                    //создаем список выбора select
                    create_select_list($character);
                ?>
        </select>
        
        
        <div class="form-item">
            <label for="char-pairing">Персонажи/Пейринг</label>
             <input class="form-input" type="text" name="char-pairing">
        </div> 
            
            
        <p>С персонажами покончили, пошли дальше</p>  
        
        <div  class="form-item">
        <label>Если есть бета, выберите<br /></label>
            <select name="beta-id[]">
            <option value="0" >Выберите бету</option>
            <?php               
               create_select_list($beta);
            ?> 
            </select>       
        </div>
        
        <div  class="form-item">
        <label>Если есть соавтор, выберите<br /></label>
            <select name="coauthor-id[]">
            <option value="0" >Выберите соавтора</option>
            <?php               
               create_select_list($coauthor);
            ?> 
            </select>       
        </div>
        
        <div  class="form-item">
        <label>Выберите жанр<br /></label>
            <?php               
               create_checkbox_list($genre, "genre");
            ?>        
        </div>
        
        <div  class="form-item">
            <label>Выберите рейтинг<br /></label>
            <?php
                create_radio_list($raitings, "raiting");
            ?>            
        </div>
        <div  class="form-item">
            <label>Выберите категорию<br /></label>
            <?php                
                create_radio_list($categories, "category");
            ?>            
        </div>
        
        <div class="form-item">
        <label for="summary">Краткое содержание<br /></label>
        <textarea class="form-item form-input" name="summary" rows="10" cols="20"></textarea>
        </div>
        
        <div class="form-item">
        <label for="dedication">Посвящение<br /></label>
        <textarea class="form-item form-input" name="dedication" rows="10" cols="20"></textarea>
        </div>
        
        <div class="form-item">
        <label for="note">Примечание<br /></label>
        <textarea class="form-item form-input" name="note" rows="10" cols="20"></textarea>
        </div>
        
        <div class="form-item">
            <label for="title">Название фика</label>
             <input class="form-input" type="text" name="title" required>
        </div> 
        
        <div class="form-item">
            <label for="filename">Имя файла</label>
             <input class="form-input" type="text" name="filename" required>
        </div> 
        
        <div class="form-item">
        <label for="alltext">Текст фанфика<br /></label>
        <textarea class="form-item text-input" name="alltext" rows="20" cols="20"></textarea>
        </div>
        
        <!--
<label for="year">Год написания</label>
        <input class="form-input" type="text" name="year" />
-->
        
        <label for="date-text">Дата написания (мм-гггг)</label>
        <input class="form-input" type="text" name="date-text" required >
        
        
        
        <div class="form-item">
            <input class="button" type="submit" name="addtext" value="Добавить" />
        </div>
    </form>
     
     <?php
        if (isset($_POST['addtext'])) {
            print_r($_POST);
            echo "<p></p>";
        }
     ?>
     
<?php
    } else {
        require_once "auth.php";
        }
    
    require_once "footer.php"; 
    mysqli_close($link);
?>