<?php
require_once 'db.php';

if (isset($_SESSION['user_login']) ){// Проверка на наличие значения в масиве $_SESSION

    echo $_SESSION['user_login'] . ',Добро пожаловать на страницу администратора!';
    echo '<br>';
    echo 'Вы посещали эту страницу: ' . $_COOKIE['page_visit'] . 'раз'; // количество посещений сайта

    echo '<a href="logout.php">Выход из аккаунта</a>';

}else{
    die('');
}
