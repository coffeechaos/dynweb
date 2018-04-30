<?php

$movie_id = $_POST['watched_id']; //в переменную movie_id помещаем отправленный с помощью ajax айди фильма с ключем watched_id
$cookie_name = "watched[$movie_id]"; // имя куки и айди фильма

if( isset ($_COOKIE['watched']) && //проверка существования куки функцией array_key_exists
array_key_exists($movie_id, $_COOKIE['watched']) ){//аргументы- ключ для поиска, массив
    setcookie($cookie_name, '', time()-400, '/');//удаление куки при нажатии кнопки "Не смотрел"
}else{
    setcookie($cookie_name, '1', time()+60*60, '/');// если нет куки с аргументами
}
