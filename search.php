<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="css/reset.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|PT+Sans+Narrow:400,700&subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <title>Перекресток Надежды</title>
</head>
<body>
    <div class="container">
        <?php
            require_once "scripts/config.php";
            require_once "scripts/functions.php";
            $link = db_connect();
            require_once "header.php";
        ?>
        
        <div class="main-content">
            <h1>Поиск текстов</h1>
            
            <?php
                echo "<p>";
                print_r($_REQUEST);
                echo "</p>";           
            ?>
            
        </div>
        <?php
            require_once "footer.php";
            mysqli_close($link);
        ?>
        
    </div>
    
    
</body>
</html>
