<?php
#Файл уничтожения сессии и редирект пользывателя на страницу авторизации
require_once 'db.php';

$_SESSION =[]; //Очистка данных сессии, присвоив ей пустой массив

//Удаление куки для соответствующей сессии
if(isset($_COOKIE[session_name() ]) ){ //пустое значение для куи сименем текущей сессии
    setcookie(session_name(), '', time()-3600, '/'); //указываем момент в прошлом, для самоуничтожения куки
}

session_destroy(); //уничтожение хранилища текущей сессии функцией

header('Location: ../signin.php'); //Redirect пользывателя на страницу авторизации
