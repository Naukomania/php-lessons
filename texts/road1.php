<?php
session_start();
require_once "../scripts/config.php";
require_once "../scripts/functions.php";
$text_id =7;
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
<p>Вот она — дорога, ведущая в неизведанные миры. Ты находишь себя на каждом перекрестке, ты идешь вслед за солнцем, вспоминаешь и узнаешь, встречаешься и расстаешься.</p>
<p>Вот она, Дорога — золотистая лента легла под ноги. Но что это? Кто-то поставил посреди дороги шлагбаум, перечеркнув золотую ленту черной полосой. И дальше — черный канат отгораживает участок Дороги, не давая пройти дальше. Кто это сделал? Неведомые враги, разрушители, ненавистники всего живого? Нет, такие же путники как ты. Зачем им закрывать Дорогу? Закрывать? Да нет, они просто решили присвоить себе участок Дороги, завладеть им единовластно, чтобы никто другой не смел пройти там, где стоят они, и узнать то, что знают они.</p>
<p>Не трогай их. Пусть стоят. Ведь они не смогут выйти за пределы черного квадрата, и из-за этого дорога под их ногами перестает быть Дорогой — ведь никто больше не идет по ней. И настанет время, когда золотая лента вынырнет из-под их ног и побежит дальше — вперед, к неведомым далям. А они останутся в своем квадрате, так и не заметив, что их Дорога — закончилась.</p>

</div>
<div class="comments-main">
<?php require_once "../models/comments.php"; ?>
</div>
<?php require_once "../models/footer.php"; ?>
</div>
</body>
</html>