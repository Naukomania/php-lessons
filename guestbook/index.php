<?php

/**  
 * @author Assidi
 * @copyright 2016
 * 
 * Гостевая книга сайта "Перекресток Надежды"
 */
    
    session_start();
    
    require_once "config.php";
    require_once "functions.php";       
    
    //Проверяем, отправлена ли форма
    
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['verify'])) {
        // вытаскиваем данные из формы
        
        $name=$_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $user_pass_phrase = $_POST['verify'];
        $user_pass_phrase = trim($user_pass_phrase);       //обрезаем пробелы
        // запихиваем в сессию 
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['message'] = $message;        
        // а проверочное слово, наоборот, достаем из сессии
        $pass_phrase = $_SESSION['pass_phrase'];
        
        // инициализация перменных ошибки        
        $error = false;
        $error_name = '';
        $error_mail = '';
        $error_message = '';
        $error_verify = '';
        

        // проверка на ошибки
        
        if (empty($name)) {
            $error = true;
            $error_name = 'Имя не указано';
        }
        
        if (empty($email)) {
            $error = true;
            $error_email = 'Электронный адрес не указан';
        }
        
        if (empty($message)) {
            $error = true;
            $error_message = 'Отсутствует текст сообщения';
        }
        
        if ($user_pass_phrase != $pass_phrase) {
            $error = true;
            $error_verify = 'Неправильно введена идентификационная фраза';
        }
        
        // запись в файл, если нет ошибок
        
         if (!$error) {
            save_message($name, $email, $message);
            $_SESSION["name"] = '';
            $_SESSION["email"] = '';
            $_SESSION["message"] = '';      
            $_SESSION['pass_phrase']=generate_pass_phrase(); 
            // очистка сессии и переход обратно на страницу гостевой книги
            session_unset();  
            session_destroy(); 
            header("Location: index.php");    
            exit;                
         }        
    }
    else  {
        // форма не отправлена, сессия пустая, генерируем новое проверочное слово 
        $pass_phrase = generate_pass_phrase(); 
        $_SESSION['pass_phrase']= $pass_phrase;  
        
    }
    
    
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|PT+Sans+Narrow:400,700&subset=cyrillic,cyrillic-ext" rel="stylesheet">       
    <link href="../css/reset.css" type="text/css" rel="stylesheet">
    <link href="../css/style-quest.css" type="text/css" rel="stylesheet">    
</head>
<body>  
    <div class="container">
        <a class="button-quest" href="../index.php">На главную</a>
        <!--<p><a href="admin.php">Админка</a> </p>-->        
        <h1>Гостевая книга</h1>
        <p class="p-head">Итак, здесь можно оставить свои пожелания по содержанию и 
        оформлению сайта. Конструктивный диалог приветствуется, неконструктивные 
        сообщения автор удаляет без объяснения причин. Особенно приветствуются предложения
        по структуре движка. Пока что автор хочет сделать подобие сайтов с фанфиками с 
        возможностью сортировки по фандому, жанрам и персонажам.   
        </p>
        <form class="main-form" method="POST" action="">
            <p>
                <label for="name">Ваше имя:<br /></label>
                <input class="form-item" type="text" name="name" value="<?php echo $_SESSION["name"];?>" />
                <span class="error"><?php echo $error_name;?></span>
            </p>
            <p>
                <label for="email">Адрес электронной почты<br /></label>
                <input class="form-item" type="email" name="email" value="<?php echo $_SESSION["email"];?>" />
                <span class="error"><?php echo $error_email;?></span>
            </p>
            <label for="message">Сообщение<br /></label>
            <textarea class="form-item" name="message" rows="10" cols="20"><?php echo $_SESSION["message"];?></textarea>
            <span class="error"><?php echo $error_message;?></span>
            <div class="captcha">
                <label for="verify">Проверка:</label>
                <input type="text" class="captcha-input" name="verify" placeholder="Введите идентификационную фразу"/>
                <?php                  
                    // формирование картинки для капчи и запись ее на диск
                    captcha($_SESSION['pass_phrase']);
                ?>
                
                <img src="captcha.png" class="captcha-img" alt="Проверка идентификационной фразы"/>
                <span class="error"><?php echo $error_verify;?></span>
            </div>
            
            <div class="buttons">
                <input class="button-quest" type="submit" value="Отправить" />
                <input class="button-quest" type="reset" value="Очистить" />
            </div>
        
    </form>   
    
    
    <!-- Здесь сама гостевая книга -->
    
    <?php       
        
        $articles = get_all_articles ();    
        $n_articles =count($articles);
        $pages = ceil($n_articles/ARTICLE_PER_PAGE);
        //echo "Количество записей ".$n_articles." Количество страниц ".$pages."<br />";
        
        // определяем начальный и конечный индекс в массиве для строчек вывода
        if (isset($_GET['page'])) {
            // надо вывести конкретную страницу
            $cur_page = $_GET['page'];
            $i_start = $n_articles -  $cur_page*ARTICLE_PER_PAGE;
            if ($i_start<0) $i_start=0; // на последней странице может быть меньше записей
            $i_finish = $i_start + ARTICLE_PER_PAGE - 1;
            }
        else {
                // либо первая страница, либо все записи, если страница одна
                $cur_page = 1;
                $i_start = $n_articles - ARTICLE_PER_PAGE;
                $i_finish = $n_articles - 1;
                if ($i_start<0) $i_start=0; // если страница одна, на ней может быть меньше записей
            }
            
            // теперь выводим то, что получилось 
            for ($i=$i_finish; $i>=$i_start; $i--) {
                $a = $articles[$i];
                //разбираем запись на составляющие
                $message = get_message($a);
                //убираем пробелы и лишние знаки
                $message = check_mess($message);
                $date = $message['date'];
                $name = $message['name'];
                $email = $message['email'];
                $mess = $message['message'];
                ?>
                
                
                <article class="note">
                    <div class="note-head clearfix">
                        <a href="mailto:<?=$email?>" class="name"><?=$name?></a>
                        <div class="date"><?=$date?></div>
                    </div>
                    
                    <div class="message"><?=$mess?></div>        
                </article>
                
                <?php
            } // закрываем цикл
              
              // Теперь, собственно, пагинация, если страниц больше одной
              if ($pages>1) {                
                for ($i=1; $i<=$pages; $i++) {
                    //номер текущей страницы выводим другим стилем
                    if ($i==$cur_page) {
                        //echo '<a class="pagination-curpage" href="index.php?page='.$i.'">'.$i.'</a>';
                        echo '<span class="pagination-curpage">'.$i.'</span>';
                    }
                    else {
                        echo '<a class="pagination" href="index.php?page='.$i.'">'.$i.'</a>';    
                    }
                                       
                   
                } // закрываем цикл по страницам
              } // закрываем if
    ?>
    
    
    </div> <!-- container -->
    
</body>
</html>