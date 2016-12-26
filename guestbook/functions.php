<?php

/**
 * @author Assidi
 * @copyright 2016
 */

// чтение записей из базы в массив 
function get_all_articles () {
    //читаем из базы все записи
     $content = file_get_contents(BASE);
     // разбираем на отдельные записи, все складываем в массив 
     $articles = explode(DELIMITER, $content);        
     //последний элекмент массива - пустая строка, его удаляем
     $s = array_pop($articles);
     return $articles;   
}

// запись в файл из массива 

function save_all_articles ($articles) {
    // объединяем в строку все элементы массива
    $content = implode(DELIMITER, $articles);
    $content = $content.DELIMITER."\n";    
    $result=file_put_contents(BASE, $content);    
    return $result;
}

// Функция записывает сообщение в файл 
function save_message($name, $email, $message) {
    $date=date("d.m.y - H:i:s");
    $str = $date.SYMBOL.$name.SYMBOL.$email.SYMBOL.$message.DELIMITER."\n";
    $file=fopen(BASE, "a");
    fwrite($file, $str);
    fclose($file);
}

// Функция извлекает компоненты из сообщения, извлеченного из файла 
function get_message ($str) {
    $arr = explode(SYMBOL, $str);
    $message = array();
    $message['date'] = $arr[0];
    $message['name'] = $arr[1];
    $message['email'] = $arr[2];
    $message['message'] = $arr[3];
    return $message; 
}

// Функция для проверки сообщения

function check_mess($message) {
    $message['name']=trim($message['name']);
    $message['email']=trim($message['email']);
    $message['message']=trim($message['message']);
    
    $message['name']=htmlspecialchars($message['name']);
    $message['email']=htmlspecialchars($message['email']);
    $message['message']=htmlspecialchars($message['message']);
    
    $message['message'] = str_replace("\n","<br>",$message['message']);
    return $message;
}

// функция для генерации слова для капчи 

function generate_pass_phrase() {
    // создание идентификационной фразы из шести случайных букв латинского алфавита
    $pass_phrase="";
    for ($i=0; $i<CAPTCHA_NYMCHARS; $i++ ) {
        $pass_phrase .= chr(rand(97, 122));
    }
    return $pass_phrase;
}    

function captcha($pass_phrase) {
    // создание изображения
    $img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);
    
    //установка цветов: белого для фона, черного для текста и серого для графики
    $bg_color = imagecolorallocate($img, 220, 220, 220);    // белый цвет
    $text_color = imagecolorallocate($img, 30, 30, 30);        // черный цвет
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
  $angle = 0;
  imagettftext($img, 18, $angle, 9, CAPTCHA_HEIGHT - 10, $text_color, 'Courier New Bold.ttf', $pass_phrase);

    imagepng($img, "captcha.png");

    // Удаление изображения
  imagedestroy($img);
}

// удаление элемента из массива со сдвигом оставшихся и перенумерованием
 function delete_element ($arr, $index) {
    // фунцкция удаляет элемент с индексом index из массива arr;
    
    $arr_result=array();    
    $n = count($arr);
    // копируем кусок массива до нужного элемента
    for ($i = 0; $i < $index; $i++) {
        $arr_result[$i] = $arr[$i];        
    } 
    // копируем кусок массива после нужного элемента
    for ($i=$index+1; $i<$n; $i++) {
        $arr_result[$i-1] = $arr[$i];
    }   
    return $arr_result;
}

?>