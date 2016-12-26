<?php
session_start();
require_once "../scripts/config.php";
require_once "../scripts/functions.php";
$text_id =16;
$text_title =get_title($text_id);
?>
<!DOCTYPE HTML>
<html>
<?php
require_once "../models/head.php";
?>
<div class="container">
<?php
require_once "../models/header.php";?>
<div class="main-content">
<h1><?php echo $text_title;?></h1>
<?php require_once "../models/fanfic-info.php"; ?>
<?php if (isAdmin()) { require_once "../models/fanfic-admin.php"; } ?>
<p>Это было бы так легко — сделать выбор...</p>
<p>Это было бы так просто  — только бы знать, что выбирать. Между чем и чем. Черное — белое. Покой — движение. Жизнь — смерть. Но из всего многообразия красок взять только две — это тоже выбор. Сначала выбрать из чего. Потом выбрать <span class="italic">что</span>. </p>
<p>А я не хочу такого выбора! Я не хочу себя ограничивать ни в чем. Одно из двух — это уже не выбор, это уже не свобода. Это узкая тропинка, зажатая меж глухих каменных стен и свобода только одна — вперед или назад... а мне не нужна такая свобода! Я хочу взлететь, подняться над этими стенами, чтобы видеть весь мир. Я хочу стучаться в каждое окно, я хочу войти в каждую дверь, я хочу пройти по каждой улице. Я хочу быть везде. Стать воздухом, дарующим жизнь каждому, ветром врываться в окна, нетерпеливым дождиком стучать по крыше, стать землей, опорой для всех... И пускай меня не замечают, пускай растворясь во всем, я потеряю себя, но я буду свободна. Это <span class="italic">мой</span>  выбор. </p>

</div>
<div class="comments-main">
<?php require_once "../models/comments.php"; ?>
</div>
<?php require_once "../models/footer.php"; ?>
</div>
</body>
</html>