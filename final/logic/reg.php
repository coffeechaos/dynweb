<?php
require_once 'db.php'; // запрос к базе данных
$login = trim($_POST['login']); //trim удаляет пробелы с начала и конца строки
$pwd =trim ($_POST['pwd']);
if( !empty($login) && !empty($pwd) ) { //проверка значений
// Проверка существования пользывателя
    $sql_check='SELECT EXISTS(SELECT login FROM users WHERE login =:login)'; //SQL ЗАПРОС, оператор EXISTS
    $stmt_check=$pdo->prepare($sql_check);
    $stmt_check->execute([':login'=>$login]); //виполнение (execute)

    if($stmt_check->fetchColumn()){// Метод fetchColumn когда возвращается одна колонка, извлечь результат запроса для проверки
        die('Пользователь с тами логином уже существует');
    }
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = 'INSERT INTO users(login, password) VALUES(:login, :pwd)';
    $params = [ 'login' => $login, ':pwd' => $pwd];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo 'Вы успешно зарегистрировались!';
}else{
    echo 'Пожалуйста, заполните все поля';
}
?>

<br>
<a href="../signin.php">Страница авторизации</a>  <!--перенаправление-->
