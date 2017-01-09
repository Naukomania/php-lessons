<!-- Короткая шапка фанфика, используется для списков  - на главной странице и в результатах поиска -->
<div class="about-text">
    <p><a class="title" href="<?= $fanfic_info['filename']?>"><?= $fanfic_info['title']?></a></p>
    <p><span class="bold">Фандом: </span><?= $fanfic_info['fandom']?></p>
    <p><span class="bold">Персонажи: </span><?= $fanfic_info['pairing']?></p>
    <p><span class="bold">Жанр: </span><?= $fanfic_info['genre']?></p>
    <p><?= $summary?></p>
    <p><span class="bold">Размер: </span><?= $fanfic_info['size']?>К</p>
</div>