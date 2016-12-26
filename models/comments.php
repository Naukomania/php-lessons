<?php
 //echo "<p>Здесь можно будет добавить комментарий к фанфику с номером ".$text_id."</p>";
    $error_message = "";
    $error = false;
 // если форма отправлена, обрабатываем
 if (isset($_POST['addcomment'])) {
   // print_r($_POST);
    //echo "<p></p>";
    $email = $_POST['email'];
    $name=$_POST['name'];       
    $comment = $_POST['commenttext'];
    $date = time();
    
    if (empty($name)) {
            $error = true;
            $error_name = 'Имя не указано';
        }
    
    if (empty($email)) {
            $error = true;
            $error_email = 'Электронный адрес не указан';
    }
    
    if (empty($comment)) {
            $error = true;
            $error_message = 'Отсутствует текст комментария';
    }
    
    if (!$error) {
        // ошибок нет, сейчас будет смертельный момер - запись в базу 
        $email = trim($email);
        $name = trim($name);
        $comment = trim($comment);
        
        $email = mysqli_escape_string($link, $email);
        $name = mysqli_escape_string($link, $name);
        $comment = mysqli_escape_string($link, $comment);
        $comment = strip_tags($comment);
        
        $query = "INSERT INTO `comments`(`fanfic-id`, `name`, `email`, `date`, `text`) ".
        "VALUES ('".$text_id."', '".$name."', '".$email."', '".$date."', '".$comment."')";
        //INSERT INTO `comments`(`comment-id`, `fanfic-id`, `name`, `email`, `date`, `text`) 
        //VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
        //echo "<p>".$query."</p>";
        $r = mysqli_query($link, $query);
        //echo "Коментарий добавлен";
    }
 }
 
?>
<div class="comment-main">
    <h2>Оставить комментарий</h2>
    <form name="addcomment" action="" method="post">
        <p>
            <label for="name">Ваше имя:<br /></label>
            <input class="form-item" type="text" name="name" required>
            <span class="error"><?php echo $error_message;?></span>
        </p>
        
        <p>
            <label for="email">Адрес электронной почты<br /></label>
            <input class="form-item" type="email" name="email" required>
            <span class="error"><?php echo $error_message;?></span>
        </p>
        
        <p>
            <label for="commenttext">Текст комментария<br /></label>
            <textarea class="form-item text-input" name="commenttext" rows="10" cols="20" required></textarea>
            <span class="error"><?php echo $error_message;?></span>
        </p>
        
        <div class="form-item">
                <input class="button" type="submit" name="addcomment" value="Добавить" />
         </div>
    </form>
    <?php
    
        // теперь здесь будет форма вывода комментариев
        $query = "SELECT * FROM `comments` WHERE `fanfic-id` = '".$text_id."'";
        $comments = run_query($link, $query);
        $n = count($comments);
        if ($n >0 ) {
            ?>
            <h2>Комментарии</h2>
            <?php
            for ($i=0; $i<$n; $i++) {
                $row = $comments[$i];
                //print_r($row);
                //echo "<p></p>";
                $com_date = $row['date'];
                $com_name = $row['name'];
                $com_email = $row['email'];
                $com_text = $row['text'];                
                $com_text = preg_replace('/[\r\n]+/', "<br />", $com_text);
                $datetime = date("d.m.Y H:i", $com_date);
                //echo "<p>$datetime</p>";
                ?>
                
                <article class="comment">
                    <div class="comment-head clearfix">
                        <a href="mailto:<?=$com_email?>" class="name"><?=$com_name?></a>
                        <div class="comment-date"><?=$datetime?></div>
                    </div>
                    
                    <div class="comment-text"><?=$com_text?></div>        
                </article>
                <?php 
            }
        } 
    ?>
</div>
