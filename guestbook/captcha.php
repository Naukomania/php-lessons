<?php

/**
 * @author Assidi
 * @copyright 2016
 */
    
 
    define('CAPTCHA_NYMCHARS', 6);
    define('CAPTCHA_WIDTH', 100);
    define('CAPTCHA_HEIGHT', 40);

    
    
     // Вытаскивание идентификационной фразы из переменной сессии 
     $pass_phrase = $_SESSION['pass_phrase'] ;
    
    
    // создание изображения
    $img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);
    
    //установка цветов: белого для фона, черного для текста и серого для графики
    $bg_color = imagecolorallocate($img, 220, 220, 220);    // белый цвет
    $text_color = imagecolorallocate($img, 0, 0, 0);        // черный цвет
    $graphic_color = imagecolorallocate($img, 64, 64, 64);  // серый цвет
    
    // заполнение фона
    imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bg_color);
    
    // рисование нескольких линий, расположенных случайным образом
    for ($i=0; $i<5; $i++ ) {
        $c1 = mt_rand(0,255);
        $c2  = mt_rand(0,255);
        $c3  = mt_rand(0,255);
        $graphic_color = imagecolorallocate($img, $c1, $c2, $c3);
        imageline($img, 0, rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
    }
    
    // рисование нескольких точек, расположенных случайным образом    
  for ($i = 0; $i < 100; $i++) {
    $c1 = mt_rand(0,255);
    $c2  = mt_rand(0,255);
    $c3  = mt_rand(0,255);
    $graphic_color = imagecolorallocate($img, $c1, $c2, $c3);
    imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
  }

  // написание текста идентификационной фразы
  $angle = mt_rand(-5, 5);
  imagettftext($img, 18, $angle, 10, CAPTCHA_HEIGHT - 10, $text_color, 'Courier New Bold.ttf', $pass_phrase);

  // вывод изображения в  PNG-формате с использованием заголовка
  header("Content-type: image/png");
  imagepng($img);

  // Удаление изображения
  imagedestroy($img);
    
?>