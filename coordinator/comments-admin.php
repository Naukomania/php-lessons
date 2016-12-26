<?php

    /**
 * @author Assidi
 * @copyright 2016
 */
 
    // Панель администратора - работа с комментариями
    
    session_start();
    require_once "../scripts/config.php";
    require_once "../scripts/functions.php";
    $link = db_connect();
    require_once "header.php";
    if (isAdmin()) { 
        
        if (isset($_GET['index'])) {
            print_r($_GET);
            echo "<p></p>";
            $com_id = $_GET['index'];
            $query = "DELETE FROM `comments` WHERE `comment-id` = '".$com_id."'";
            echo "<p>$query</p>";
            $r = mysqli_query($link, $query);
            echo "<p>Комментарий удален</p>";            
        }
        
        ?>
    
    
    
    <p>Здесь можно удалять комментарии. Может, что-то еще с ними сделать.</p>
    
    <?php
    // читаем таблицу комментариев, отсортированную по дате - сначала последние
    $query = "SELECT * FROM `comments` ORDER BY `date` DESC";    
    $comments = run_query($link, $query);
    
    $n = count($comments);
    for ($i = 0; $i<$n; $i++) {
        // читаем строку из таблицы комментариев
        $row = $comments[$i];
        //print_r($row);
        //echo "<p></p>";   
        $name = $row['name'];
        $date = $row['date'];
        $date = date("d.m.Y H:i", $date);
        $text = $row['text'];
        $text = preg_replace('/[\r\n]+/', "<br />", $text);
        $fanfic_id = $row['fanfic-id']; 
        $comment_id = $row['comment-id'];
        // достаем информацию о фанфике 
        $fanfic_info = get_row($link, "fanfics", "fic-id", $fanfic_id);
        //print_r($fanfic_info);
        //echo "<p></p>";
        $filename = $fanfic_info['file-name'];
        $filename = "../texts/".$filename.".php";
        $title = $fanfic_info['title'];
        ?>
        <div class="comment-admin">
            <p>Имя <?= $name?></p>
            <p>Дата <?= $date?></p>
            <p>К фанфику <a href="<?= $filename?>" target="blank"><?= $title?></a></p>
            <p><?= $text?></p>
            <a class="button" href="comments-admin.php?index=<?=$comment_id?>">Удалить</a>
        </div>
        
        
        <?php
    }
    ?>
     
<?php
    } else {
        require_once "auth.php";
        }
    
    require_once "footer.php"; 
    mysqli_close($link); 
?>