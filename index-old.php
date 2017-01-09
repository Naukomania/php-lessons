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
            <h1>Перекресток Надежды</h1>
            <p><a href="coordinator/index.php">Админка</a></p>
            <p>Здесь будет сайт с собственным движком</p>
            <p>Недавно введенные фанфики</p>
            <?php
                $query = "SELECT * FROM `fanfics` order by `date-publish` DESC LIMIT 3";
                $result = run_query($link, $query);
                $n = count($result);
                // цикл по строкам полученного массива, каждая строка - это данные одного фанфика 
                for ($i=0; $i<$n; $i++) {
                    // строка с данными о фанфике
                    $row = $result[$i]; 
                    // передаем функции строку, она по ней выводит краткую информацию о фанфике                    
                    fanfic_shot_info($link, $row);
                }
            ?>
            
        </div>
        <?php
            require_once "footer.php";
            mysqli_close($link);
        ?>
        
    </div>
    
    
</body>
</html>
