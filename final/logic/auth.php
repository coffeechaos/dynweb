<?php

require_once 'db.php'; // запрос к базе данных
$login = trim($_POST['login']); //trim удаляет пробелы с начала и конца строки
$pwd = trim ($_POST['pwd']);
if( !empty($login) && !empty($pwd) ) { //проверка ввода данных

    $sql = 'SELECT login, password FROM users WHERE login = :login'; //авторизация пользывателя, вернет пароль при условии совпадения логинов, и запрос столца "login" для приветствия
    $params = [':login' => $login];

    $stmt = $pdo -> prepare($sql);
    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_OBJ); //присвоение результата запроса переменной $user, параметр FETCH_OBJ у метода fetch

    if($user){

        if( password_verify($pwd, $user->password) ){ // Проверка на совпадение паролей
            #чтобы сохранить данные для текущего пользывателя нужно присвоить значение произвольному елементу суперлобального масива session
            $_SESSION['user_login'] = $user->login;//добавление елементу user_login логин пользывателя
            header('Location: ../index.php'); // Успешная авторизация
        }else{
            echo 'Неверный логин или пароль';
        }
    }else{
        echo 'Неверный логин или пароль';
    }

}else{
    echo 'Пожалуйста, заполните все поля';
}
