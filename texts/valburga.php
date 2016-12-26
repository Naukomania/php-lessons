<?php
session_start();
require_once "../scripts/config.php";
require_once "../scripts/functions.php";
$text_id =2;
$text_title =get_title($text_id);
?>
<!DOCTYPE HTML>
<html>
<?php
require_once "../models/head.php";
?>
<div class="container">
<?php
require_once "../models/header.php";?><div class="main-content">
<h1><?php echo $text_title;?></h1>
<?php require_once "../models/fanfic-info.php"; ?>
<?php if (isAdmin()) { require_once "../models/fanfic-admin.php"; } ?>
<p>В один совершенно обычный день совершенно обычного года семейство Блэк, как всегда, собралось в столовой. Этот обед ничем не выделялся из множества других обычных обедов, даже отсутствием Сириуса — о непутевом старшем сыне за два года уже успели забыть. Зато образцовый младший сын, приехавший на каникулы перед своим последним годом обучения, был здесь. Как всегда, безупречно причесанный, одетый в чисто выглаженную мантию, разве что немного бледнее обычного и чуть-чуть взволнованный. Но привыкшие к размеренному течению жизни Валбурга и Орион этого не замечали. </p>
<p>Все было как обычно. Не хватало только одного — еды. Почему-то никто не спешил подавать на стол, хотя давно уже было пора. </p>
<p>— Кричер! — Валбурга легонько стукнула рукой по столу. </p>
<p>Никто не отозвался, хотя на этот тихий окрик эльф должен был прибежать мгновенно. </p>
<p>— Кричер! — повторила Валбурга чуть громче. </p>
<p>Орион с опаской посмотрел на жену. Регулус побледнел так, что это стало уже заметно. </p>
<p>— Куда запропастился этот негодный эльф? — сердито спросила Валбурга и еще раз стукнула по столу. </p>
<p>Орион зажмурился. Регулус тоскливо посмотрел под стол, прикидывая, можно ли там спрятаться. </p>
<p>— Я вас спрашиваю! — повысила голос Валбурга.</p>
<p>Орион очнулся:</p>
<p>— Дорогая, не волнуйся, сейчас он подаст обед. </p>
<p>— Сходи и проверь! — не признающим возражений тоном приказала Валбурга. </p>
<p>Пока Ориона не было, Регулус упорно смотрел в пол, а его лицо уже сравнялось цветом со скатертью. Но Валбурга не обратила внимания на сына, поглощенная ожиданием мужа. </p>
<p>— Ну, что? </p>
<p>— Дорогая, — запинаясь, проговорил Орион, —  на кухне его нет. И вообще в доме нет...</p>
<p>— А обед?</p>
<p>— И обеда нет... — обреченно вымолвил Орион, опускаясь на стул. </p>
<p>Валбурга выпрямилась во весь рост. </p>
<p>— И вы собираетесь просто так сидеть, когда наш домовой эльф пропал неизвестно куда? </p>
<p>— Но откуда я знаю, куда он пропал? — пробормотал Орион, вслед за сыном тоскливо глядя под стол. </p>
<p>Регулус схватился руками за голову и посмотрел на мать глазами человека, приговоренного к поцелую дементора. </p>
<p>— Ты что-то знаешь? — Валбурга тут же переключила все внимание на сына. </p>
<p>Регулус собрался с силами и выпалил:</p>
<p>— Темный Лорд попросил у меня эльфа для выполнения какого-то поручения... </p>
<p>— И ты отдал ему нашего эльфа? — не предвещающим ничего хорошего голосом спросила Валбурга. </p>
<p>Регулус тихо всхлипнул и кивнул. </p>
<p>— Да как он смеет! — на щеках Валбурги появились красные пятна. — Нашего домашнего эльфа! Лучше бы Ориона позвал, все равно от него никакой пользы нет! </p>
<p>— Мама, это же Темный Лорд, — робко проговорил Регулус. </p>
<p>Но разошедшуюся Валбургу было уже не остановить. </p>
<p> — Да какой он Темный Лорд! Мы с ним вместе в школе учились, он был на два курса меня младше! Я его непростительным заклятьям учила, книги по темной магии приносила из дома, а «Хоркруксы для чайников» он до сих пор не вернул! И он еще смеет забирать нашего домашнего эльфа перед обедом!  </p>
<p>Теперь отец и сын смотрели под стол вместе. Орион с тоскою думал о палочке, оставшейся в кабинете. У Регулуса палочка по школьной привычке была с собой, но он не успел бы поставить щит даже невербальным заклинанием.  </p>
<p>— Регулус! — голос матери вывел юношу из печальных размышлений. — Зови его сюда!</p>
<p>— Кого? </p>
<p>— Темного Лорда! </p>
<p>— Но, мама... — Регулус от ужаса не мог сказать ничего больше.</p>
<p>Валбурга была непреклонна.</p>
<p>— Зови, кому говорят!  </p>
<p>Юноша тяжело вздохнул, закатал рукав мантии, явив на свет изображение черепа со змеей, зажмурил глаза и коснулся метки указательным пальцем. От боли Регулус тихо застонал, но тут же оборвал стон. Орион рванулся было к сыну, но под пристальным взглядом жены остался на месте. </p>
<p>Через несколько минут хлопнула дверь и в столовую вошел Лорд Волдеморт — еще более бледный, чем Регулус, в развевающейся темной мантии и с красными искрами в глазах. Он собирался что-то сказать, но Валбурга его опередила.</p>
<p>— Томми! Где Кричер? </p>
<p>Орион и Регулус, хорошо знавшие интонации своей жены и матери, в ужасе переглянулись. Темный Лорд в таких тонкостях не разбирался и поэтому не осознавал, что его ждет. </p>
<p>— Кричер выполняет мое поручение... </p>
<p>Волдеморт не привык, чтобы им командовали, поэтому ответ получился несколько неуверенным. </p>
<p>— А почему это твое поручение должен выполнять наш домашний эльф? Ты, кажется, печешься о благе чистокровных волшебников, Томми? Тогда какое право ты имеешь оставлять их без обеда?!</p>
<p>— Но, Валбурга... — начал было Темный Лорд но договорить ему не дали. </p>
<p>— А ну, быстро отправляйся на кухню! </p>
<p>— Зачем? </p>
<p>— Сам приготовишь нам обед, раз Кричера отправил неизвестно куда. Быстро! </p>
<p>Волшебная палочка Валбурги была направлена прямо на Волдеморта, а глаза ее метали искры не хуже, чем глаза самого Темного Лорда. И тому волей-неволей  пришлось покориться.</p>
<p>Глядя на жену, конвоирующую Темного Лорда в кухню, Орион не сумел сдержать возгласа восхищения. Он любил сильных женщин, но предпочитал, чтобы эти женщины командовали не им, и теперь его мечта исполнилась. </p>
<p>— Мой одноклассник Долохов, — прошептал Орион сыну, — говорил про таких, как Валбурга: «Есть женщины в русских селеньях…» </p>
<p>— Как-как? — переспросил Регулус.</p>
<p>— Ну,  по-английски  это будет приблизительно так: «Есть дамы в английских поместьях...». </p>
<p>— Это русская поговорка? — спросил Регулус, немного осведомленный о странностях русских магов. </p>
<p>— Это какое-то стихотворение. Целиком я его не помню, но там еще есть слова, — Орион процитировал,  с ходу переводя на английский магический:  «Метлу на лету остановит, в пещеру к дракону войдет!» </p>
<p>— Точно, совсем про маму! — восхищенно произнес Регулус. </p>
<p>Отец и сын переглянулись и, осторожно ступая по лестнице, направились вниз. Возле кухни они остановились и прильнули к щелочке между косяком и неплотно прикрытой дверью. </p>
<p>Валбурга стояла на середине кухни, уперев одну руку в бок, а во второй держа волшебную палочку. Темный Лорд в растерянности застыл у шкафа с посудой, не зная с чего начать. </p>
<p>— Ну, что стоишь? — с нескрываемым ехидством спросила миссис Блэк. — Кроме непростительных, никаких заклятий не знаешь? </p>
<p>Волдеморт пробормотал что-то похожее на «Авада Кедавра», но вслух произнести заклятье не решился. </p>
<p>— Ты так много шлялся неведомо где и хоть чему-нибудь полезному научился? Что ты умеешь готовить? </p>
<p>— Овсянку... — растерянно пролепетал Темный Лорд. </p>
<p>— Овсянку ешь сам! — отрезала Валбурга. — Ну, хоть мясо с овощами потушить способен? </p>
<p>Волдеморт обреченно вздохнул. </p>
<p>— Эх, не тому я взялась тебя учить! Надо было не с непростительных заклятий начинать, а с бытовых! А ну давай, повторяй за мной: «Акцио, котел!..» </p>
<p>За дверью Орион и Регулус восхищенно переглядывались и беззвучно аплодировали. Вдруг Орион хлопнул себя по лбу и рванулся к лестнице.</p>
<p>— Папа, ты куда? — удивленно спросил Регулус.</p>
<p>— Сигнуса позову! — тихо ответил Орион. — Пусть тоже полюбуется! Ему Белла  только про Темного Лорда и говорит,  он уже не знает, куда деваться! Эх, жаль, — вздохнул он, — Альфарда нет, вот бы повеселился! </p>
<p>Первая попытка овладения бытовыми заклинаниями оказалась неудачной — полный воды котел обрушился Волдеморту на голову. Мокрый с ног до головы Темный Лорд пробормотал какое-то ругательство на албанском, со страхом глядя на Валбургу. </p>
<p>— Почему я за тебя все должна делать? — возмущенно произнесла миссис Блэк. — А еще Темный Лорд!</p>
<p>— Но я достиг совершенства во многих областях магии! — попытался оправдаться Волдеморт.  </p>
<p>— Во многих? — скептически спросила Валбурга. — Ну, в чем-то может и достиг, но в других областях, Томми, ты остаешься полным невежей! </p>
<p>— Вэл... — начал было Темный Лорд, но продолжить ему не дали.</p>
<p>— Я тебе не Вэл, а миссис Блэк! Эх, жаль, я за тебя замуж не вышла! Я бы тебя научила, как вести хозяйство в домах чистокровных волшебников!</p>
<p>От подобной перспективы Волдеморту стало страшно. Он потянулся за ножом, не дотянулся и нож воткнулся в середину массивного деревянного стула. </p>
<p>— Нет уж, Томми, рагу из стульев нам не нужно! И нечего портить мне мебель! Она, между прочим, фамильная! Я тебе что сказала — режь мясо! </p>
<p>Число зрителей за кухонной дверью прибавилось — к отцу и сыну Блэк присоединился еще и младший брат Валбурги, Сигнус. Троюродные братья, затаив дыхание, следили за разворачивающейся на кухне сценой, покатываясь со смеха и хлопая друг друга по плечу. Выглядели при этом они не пятидесятилетними отцами семейств, а однокашниками Регулуса, чему сам Регулус был несказанно рад. За это он даже простил маме непочтительное отношение к Темному Лорду, тем более Лорд был сам виноват, отняв у них Кричера.  </p>
<p>— Томми, резать мясо не сложнее, чем убивать маглов! Если ты не знаешь заклинаний, тогда режь вручную! </p>
<p>«Убивать маглов было намного проще», — огрызнулся Темный Лорд, пытаясь вытащить нож, намертво застрявший в разделочной доске. Мясо резаться совсем не хотело и уворачивалось из-под ножа в ту самую секунду, когда тот  опускался на доску. </p>
<p>— Да разве кто так режет?! — возмущалась Валбурга. — Это делается всего лишь одним заклинанием! Овощи резать тем же заклинанием, но на другой доске! </p>
<p>С овощами у Волдеморта получалось еще хуже, чем с мясом — капустные листья осели у него на ушах, а когда он, разозлившись, слишком сильно взмахнул палочкой, кусок мяса шлепнулся прямо ему на голову, щедро окатив свежей кровью. </p>
<p>— И ты еще был лучшим учеником Хогвартса? — насмешливо произнесла Валбурга. — Да любой грязнокровка справился бы с приготовлением обеда лучше тебя! </p>
<p>Волдеморт поспешно вытер лицо рукавом мантии, стряхнул листья с ушей и принялся за дело. На этот раз он произнес заклинание так старательно, как будто собирался создавать еще один могущественный темный артефакт, а не просто резать овощи. И перестарался:  ножи заработали так резво, что от продуктов остались только мелкие ошметки, к тому же еще и разлетевшиеся по всей кухне, покрыв потолок замысловатым узором, в котором угадывались кольца свернувшейся змеи и зеленая молния из капустных листьев. </p>
<p>Орион с Сигнусом схватились руками за животы. Перспектива умереть в пятьдесят лет от смеха их совсем не пугала и бросить такое зрелище они не могли.  </p>
<p>— Томми! — голос Валбурги, казалось долетал до самых верхних этажей, так что Регулус зажал руками уши, а Орион с Сигнусом испуганно схватились друг за друга. — Ты что себе позволяешь? Ты хоть что-нибудь делать умеешь? </p>
<p>— Хоркруксы... — растерянно проговорил Темный Лорд. </p>
<p>— Хоркруксы я за обедом есть не буду! — категорически заявила Валбурга. — Хоть сандвичей приготовь, василиск недоделанный! </p>
<p>Волдеморт покорно вскинул палочку и пробормотал заклинание, от которого из кухонного шкафа вылетела вся посуда, сделала круг по комнате и ровным слоем приземлилась на полу, столе и голове Волдеморта. Причем последнюю выбрала для посадки большая чугунная сковородка  с выгравированной по бокам змеей. Сдирая с себя сковородку, Темный Лорд выругался на парселтонге, отчего змея ожила и в ответ разразилась такой тирадой, что лицо Волдеморта приняло цвет его глаз. </p>
<p>  Валбурга парселтонга не знала, но с украшением фамильной блэковской сковородки была вполне согласна.</p>
<p>— Да какой ты Темный Лорд, если даже сэндвичи приготовить не способен! — заорала она. — А ну, вон из моего дома!  И чтобы ноги твоей тут не было! </p>
<p>Волдеморту не надо было  повторять два раза  — он мгновенно вылетел из кухни, сшибив по дороге Ориона и Сигнуса. Через несколько секунд он уже был за пределами дома, и громкий хлопок возвестил об его исчезновении. </p>
<p>— Дорогая, с тобой все в порядке? — Орион бросился к жене. </p>
<p>Валбурга вытерла рукой пот со лба.</p>
<p>— И этому полукровке мы верили? — вопросила она. </p>
<p>Орион с Сигнусом молчали, ибо не знали, что тут и возразить. </p>
<p>— И все-таки, где Кричер?- печально вздохнул Регулус, все еще стоящий за дверью. — Кричер! — сам не веря в успех, позвал он. — Кричер, ты жив вообще? Отзовись! </p>
<p>У самых его ног раздался громкий хлопок.</p>
<p>— Хозяин Регулус звал меня? </p>
<p>— Кричер! — юноша захлопал в ладоши. — У нас тут такое было! </p>
<p>Эльф не стал спрашивать, что было — он уже вошел в кухню и в ужасе схватился за голову.</p>
<p>— Кто тут без меня хозяйничал в фамильной кухне Блэков? Кто трогал мои сковородки? Кто резал мясо моим ножом и сломал его? </p>
<p>— Темный Лорд, — растерянно пробормотал Орион. </p>
<p>— Да как он смеет! — возмутился эльф. — Госпожа, я надеюсь, больше вы не пустите его на нашу кухню! </p>
<p>— Не пустим, — почти ласково проговорила Валбурга, протянула руку и погладила эльфа по голове. Орион с Регулусом замерли от удивления. — Ты когда подашь нам обед, Кричер?</p>
<p>— Через полчаса, госпожа, — ответил эльф, низко кланяясь. </p>
<p>Валбургу удовлетворил этот ответ, и она направилась к выходу, увлекая за собой мужа, сына и брата. </p>
<p>— Эй, — пробормотал Орион, — вот если бы Том на ней тогда женился, не было бы у нас Темного Лорда. </p>
<p>— Зато была бы Темная Леди, — возразил Сигнус. </p>
<p>— Нет в жизни счастья, — вздохнул Орион и вместе с братом направился в кабинет — выкурить по сигаре перед обедом. </p>
</div>
<div class="comments-main"><?php require_once "../models/comments.php"; ?></div>
<?php require_once "../models/footer.php"; ?></div>
</body>
</html>