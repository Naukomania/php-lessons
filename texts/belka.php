<?php
session_start();
require_once "../scripts/config.php";
require_once "../scripts/functions.php";
$text_id =1;
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
<h1><?php echo $text_title;?></h1><?php require_once "../models/fanfic-info.php"; ?>
<?php if (isAdmin()) { require_once "../models/fanfic-admin.php"; } ?>
<p class="epigraf">Вскоре, однако, поползли шепотки среди синдаров о делах нолдоров до их прихода в Белерианд. Очевидно, откуда исходили он, и лихая правда оказалась раздута и отравлена ложью; но синдары были еще доверчивы и беспечны, и (как можно догадаться) Моргот именно их избрал для своих первых злобных нападок, ибо они еще не знали его.</p>
<p class="epigraf-author">«Квэнта Сильмариллион»</p>
<p>— Гваэрин!</p>
<p>Эльф, едущий медленным шагом вдоль опушки леса, резко остановился. Конь недовольно оглянулся — ну что еще такое, почему спокойно пройти не дают?</p>
<p>— Хэлворн, ты? </p>
<p>Разве не удивительно — встретить старого друга именно в тот момент, когда ты думаешь именно о нем? И еще сомневаешься — хочешь ты сейчас видеть его или нет? </p>
<p>— А ты кого ожидал увидеть? Тварь Моргота?</p>
<p>— Я думаю, вы не пускаете их сюда через горы. Как странно — я только что думал о тебе. Давай сядем, передохнем немного. </p>
<p>Эльфы расседлали коней, пустив их свободно пастись на полянке, а сами присели у корней большого вяза. </p>
<p>— Я не знал, что тебя встречу, а то бы запасся получше, — сказал Хэлворн, вытаскивая из сумки съестные припасы.</p>
<p>— Получше — это на пир для пятидесяти квэнди дней этак на десять? — улыбнулся Гваэрин. </p>
<p>— Ты вовремя напомнил мне о пире! — спохватился Хэлворн. — Государь Финголфин хочет устроить всеобщий праздник и пригласить туда всех Квэнди Белерианда. Мы уже собирались посылать гонца к Маэдросу, я сам вызвался ехать...</p>
<p>— Я могу ему передать, когда буду возвращаться. Собственно, я сам приехал с письмом от Маэдросу к Финголфину... </p>
<p>Гваэрин замолчал, уделяя пристальное внимание вину в своей фляге. Сколько лет он не видел когда-то лучшего друга, и вот теперь встретились наедине, как мечталось когда-то... и не знают, о чем говорить. Надо было сразу пойти в лагерь Финголфина, но сразу почему-то он этого не сделал. А время шло быстро и незаметно и вот уже миновало почти двадцать лет, а он так и не собрался навестить старого друга. Сначала их разделяло озеро, потом — почти половина Белерианда... но разве расстояние — это помеха для истиной дружбы? Нет, дело не в расстоянии. Их разделяет совсем другое. Ибо они знают, что. И оба не хотят говорить об этом. </p>
<p>Чуть слышный шорох раздался в ветвях старого дерева. Гваэрин насторожился.</p>
<p>— Что это? </p>
<p>— Не пугайся. Просто белка.</p>
<p>«Ага, белка», — беззвучно рассмеялась девушка, уютно устроившаяся в развилке между ветвей. Лассэлин, синдэ из Дориата, по прозвищу Белочка, шла следом за Гваэрином от самых границ Огражденного Королевства, которое тот обошел с севера. Король Тингол почему-то не доверял пришельцам с Запада, и своим подданным наказал не искать с ними контактов, но кто остановит любопытного ребенка? Сказала, что идет к двоюродной сестре в Митрим... и даже сказала чистую правду — ведь она действительно идет в Митрим. И действительно к двоюродной сестре. А то что пришельцы из-за Моря тоже живут в Митриме — так это чисто случайное совпадение, будет она с ними общаться или не будет — какое до этого дело Тинголу? Увидев всадника в серебристо-черной одежде на великолепном гнедом коне, девушка, не раздумывая, пустилась за ним следом. Хорошо, он ехал медленно, так что бежать за ним труда особого не составило. Лассэлин еще не знала, будет она разговаривать с этим незнакомым эльфом или нет. Сестренка говорила, что у них свой, особый язык и даже специально для Лассэлин спела пару песен на этом языке. Песни понравились. Даже слова немножко запомнились. Но хватит ли этих слов, чтобы можно было достойно поговорить с пришельцем из-за Моря на его языке? Так Лассэлин и кралась за Гваэрином от самой границы, пока он не встретил старого друга, а потом проворно залезла на дерево и устроилась там. Уже целых два пришельца из-за Моря! Интересно, о чем они будут говорить и поймет ли она хоть что-нибудь?</p>
<p>— Что же ты теперь, каждого шороха стал бояться?</p>
<p>— У нас на северных границах и не того забоишься. Правда, в последнее время Враг затаился. Не знаю, насколько надолго...</p>
<p>Они опять замолчали. Лассэлин, ухватившись двумя руками за толстую ветку, никак не могла понять, что же такое происходит между этими двумя эльфами. И представить нельзя, чтобы, допустим, они с сестренкой, встретившись после долгой разлуки, вот так сидели и молча смотрели друг на друга. Да они разговорятся так, что все птицы в округе замолкнут. Будут птички молча сидеть на ветках и удивленно взирать на двух девчонок, хохочущих на весь Дориат. Или на весь Митрим. А уж если они потом еще и петь начнут... Тут не только птицы, тут даже ветер умолкнет! </p>
<p>— Гваэрин, хорошо, что ты приехал. Я хотел позвать тебя на свадьбу. </p>
<p>— Чью? — не понял Нолдо.</p>
<p>— Разумеется, на свою собственную. Она — из Сумеречных Эльфов Митрима. Знаешь, они похожи чем-то на наших Тэлери, но не совсем. Тэлери — как звезды над морем, а она — как первый весенний цветок, что пробуждается вместе с землей. Они называют такие цветы «нифредиль».</p>
<p>— У меня нет времени задерживаться на чужих праздниках, — нарочито холодно сказал Гваэрин. — Ты же сам сказал, что хочешь отправить со мной весточку Маэдросу, так что я буду терять время?</p>
<p>— Гваэрин, если ты считаешь, что я все забыл, ты ошибаешься, — по холодности тона Хэлворн, кажется, решил перещеголять собеседника. — По моей ли вине твоя невеста и моя сестра погибла на Вздыбленном Льду?</p>
<p>— А ты считаешь, что по моей?</p>
<p>— А кто позволил Феанаро сжечь корабли?</p>
<p>— Ты считаешь, что можно было этого не позволить? Маэдрос сам просил отца послать корабли за вами, но он только рассмеялся в ответ. </p>
<p>— А остальные что, побоялись?</p>
<p>— Остальных Феанаро и слушать бы не стал! Ты что не помнишь, каким он тогда был?</p>
<p>Лассэлин покрепче вцепилась в держащую ее ветку. Ну почему они ругаются? Так хорошо все начиналось! Что же — получается, что эти двое только и ждали момента, чтобы вцепиться в друг друга, как пес вцепляется в волка на охоте? Но ведь они же не враги, они друзья, это видно даже такому еще неискушенному в житейских делах созданию, как Лассэлин, так что же разрушает их дружбу? Что стоит между ними? Враги? Война? А разве эльфы сражаются не на одной стороне? Они говорили о смерти. Кто-то погиб? Кто-то, очень дорогой обоим? Но разве это причина, чтобы ссорится между собой? Девушке захотелось спрыгнуть с ветки, предстать перед пришельцами из-за Моря и сказать им что-нибудь доброе, утешительное. Или спеть. Если они не поймут слов — то песню они должны понять в любом случае! Понимает же она их песни!</p>
<p>Что-то они говорили про корабли... Кто-то утонул на корабле? Или кто-то сгорел на корабле? Почему-то Лассэлин представилось белые паруса, корчащиеся в пламени... значит, был пожар и все корабли сгорели. Наверное, это сделали страшные огненные духи, которые служат Врагу. Но где здесь причина для ссоры? </p>
<p>Почему-то Лассэлин была твердо уверена, что если она сейчас спустится с дерева и попросит эльфов объяснить ей, что случилось, они не скажут ни слова. И вовсе не потому, что она едва понимает их язык...</p>
<p>— Почему же ты уплыл вместе с Феанаро? Почему не остался с нами? </p>
<p>— Я был уверен, что мы вернемся! Маэдрос мне твердо обещал! Поэтому он и не позволил мне остаться, нас и так было не очень много! А я тогда и не знал, идешь ты с нами или нет, ведь вы шли по берегу, а мы плыли на кораблях. После Альквалондэ мы не могли вообще ни о чем думать!</p>
<p>— Альквадондэ... — Хэлворн вздохнул. Вся его решимость и весь его пыл куда-то делся. — Простить себя за это не могу. То, что случилось позже — нам расплата...</p>
<p>— Но ведь это мы начали, а не вы! Феанаро...</p>
<p>— Феанаро сбросили бы в море, если бы не Фингон! Будь я проклят, если мы тогда хоть чуточку понимали, что происходит! Мы думали — Валар хотят помешать нам уйти. Я ничего не видел перед собой, помню, как Финдекано кричал «Вперед! Поможем нашим братьям!», а дальше ничего не помню. Финарфин шел в самом хвосте колонны, он не принимал никакого участия. Если бы мы хоть могли остановиться и подумать! </p>
<p>— А Финголфин?</p>
<p>— А Финголфин, как и Финарфин шел позади. Он ведь и пошел-то с нами исключительно из-за сыновей. </p>
<p>— А ты зачем пошел?</p>
<p>Хэлворн долго молчал, прежде чем ответить. </p>
<p>— Если я скажу — за Фингоном, это будет не вся правда. За ним — да, но в большей степени — за тобой. </p>
<p>— Ты пошел за мной, а я...</p>
<p>Гваэрин не закончил фразы. Зачем, если все ясно и без слов? Друг пошел за ним, а он предал друга, обрек на гибель его сестру и свою невесту, и когда они достигли того, к чему стремились, оно оказывается уже не нужным. Сколько они говорили о грядущих великих делах на просторах Эндор! И вот — Эндор лежит пред ними, а они за двадцать лет ни разу не встретились и не поговорили друг с другом. Но ведь и Маэдрос с тех пор, как они обосновались на Химринг ни разу не изъявил желания съездить к Фингону... </p>
<p>Почему они опять замолчали? Ласселин переменила позу, перейдя из полулежачего состояния в сидячее. Может все-таки спрыгнуть с дерева? Только что они о чем-то оживленно спорили — и опять замолчали надолго, делая вид, что ничего интересней хлеба и вина на свете не существует. Странное молчание. Мертвое. И страшное. С ними, наверное, произошло что-то страшное, что они не хотят вспоминать? А может быть... Что за нелепая мысль! Может быть, они сами совершили что-то страшное?.. Когда приходит беда, ты делаешь все возможное, чтобы спасти друга. Но если беда пришла, а ты не сумел или не захотел его спасти — сможешь ли ты после этого смотреть в глаза другу? Не станешь ли его избегать? </p>
<p>Может быть, эта беда связана со сгоревшими кораблями?.. Когда эльфы прибыли из-за моря на кораблях, на них напали огненные духи... Ласселин почувствовала, что ее кидает в дрожь. А почему тогда сестренка говорила, что пришельцы из-за Моря пришли с Севера по вечным льдам, куда не забирались даже самые бесшабашные искатели приключений? Непонятно. И почему-то страшно. Почему ей страшно — ведь ее-то дело нисколько не касается?</p>
<p>— Хэлворн, прости меня. Я не должен был об этом говорить. Я не должен был об этом вспоминать. </p>
<p>— Если бы было возможно не вспоминать, — отозвался Хэлворн. — Это ты меня прости. Ну что, поедем в Хитлум?</p>
<p>Ей с ними, кажется, даже по пути. Но она не будет за ними следовать. Она пойдет в Митрим потихоньку, не спеша, не пропуская лесных речек и земляничных полянок. А потом они с сестренкой и ее отцом, братом матери Лассэлин, подумают, что же такого страшного произошло с пришельцами из-за Моря. К тому времени, может, ее и язык их понимать научат. И все-таки — почему ей стало страшно? Сможет она когда-нибудь это понять или нет?</p>
<p>Гваэрин поднял голову. </p>
<p>— Я опять слышу шорох... Тебе не кажется, что здесь кто-то есть? </p>
<p>— Кто здесь может быть? — пожал плечами Хэлворн. — Просто белка. Их много водится в здешних лесах.</p>
<p>— Белка, — пробормотал Гваэрин, садясь в седло, — просто белка. А мне показалось — кто-то плачет...</p>
 

</div>
<div class="comments-main"><?php require_once "../models/comments.php"; ?></div>
<?php require_once "../models/footer.php"; ?></div>
</body>
</html>