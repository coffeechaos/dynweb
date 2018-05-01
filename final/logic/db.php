<?php
/*$prefix = 'dr_';*/
$driver = 'mysql';
$host = 'localhost';
$db_name = 'dynweb';
$db_user = 'admin';
$db_pass = '123';
$charset = 'utf8';
$optionts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try{
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $optionts);

/* // установка cookie page visit
if( isset($_COOKIE['page_visit']) ){ //проверка на наличие куки(если куки есть, то...)
    setcookie('page_visit', ++$_COOKIE['page_visit'], time()+5);// Счетчик посещения сайта на странице администратора(cookie/куки), установка куки,++ - увеличение  значения куки на 1

}else{ //если куки не существует
    setcookie('page_visit', 1, time() + 5);
    $_COOKIE['page_visit' ] =1;//начальное значение куки 1
}*/

session_start();//Инициализации сессии(функция запуска механизма сессии)

}catch(PDOException $e){
    die("Не могу подключиться к базе данных");
}

// $result = $pdo->query('SELECT * FROM movies');
/*
while ($row =$result->fetch(PDO::FETCH_ASSOC)) {
    echo 'Фильм ' . $row['title'] . 'длится' . $row['duration'] . 'минут <br>' ;
}*/

/*$rows = $result->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
var_dump($rows);
*/

#Именованные плейсхолдеры
/*$sql = 'SELECT title FROM movies WHERE duration =:duration';
$stmt = $pdo->prepare($sql);

$params = [':duration' => '141'];
$stmt->execute($params);

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);*/

// echo '<pre>';
// var_dump ($rows);

#Позиционные плейсхолдеры

/*$sql_pos ='SELECT title FROM movies WHERE duration=?';
$stmt_pos = $pdo->prepare($sql_pos);

$stmt_pos->execute(['141']);
$rows_pos = $stmt_pos->fetchAll(PDO::FETCH_ASSOC);

echo'<pre>';
var_dump($rows_pos);*/


#XSS
/*$user_input = '<script> some magic here </script>';
$safe_input = htmlentities ($user_input);

echo $safe_input;*/
