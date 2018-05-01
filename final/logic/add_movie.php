<?php
require_once 'db.php';

$movie_duration =
getNakedInput($_POST['newMovie__duration']);

$movie_title =
getNakedInput($_POST['newMovie__title']);


if( empty($movie_duration) || empty($movie_title)  || !isset($_POST['newMovie__genres']) ){ // проверка empty значений массива $_POST , проверка newMovie__genres функцией !isset
    # используется || потому что нельзя фильм если хоть одно поле пустое
    die('Пожалуйста, заполните все поля'); //прекращение скрипта при ошибке
}
/*foreach($_POST as $key=>$value)
    if(strlen($value)==0)
        echo"Поле $key - пустое"; //определяет пустое поле*/
try{ // блок для работы с транзакциями

    $pdo->beginTransaction(); // метод beginTransaction - начало работы с транзакциями обьекта pdo

#Запрос вставки фильма в таблицу movies c plaseholdes(плейсхолдерами) (title, duration)
    $sql_movie = 'INSERT INTO movies(title, duration)
    VALUES(:title, :duration)';
    $params = [
        ':title' => $movie_title,
        ':duration' => $movie_duration
    ];

#Получение id фильма для дальнейших действий
    $stmt_movie = $pdo->prepare($sql_movie);
    $stmt_movie->execute($params);

    $last_id = $pdo->lastInsertId(); // метод lastInsertId для получения id

#динамическое построение массива(так как неизвестно сколько жанров присвоино фильму)

    $genre_param = []; //  массив со значениями для плесхолеров
    $rows = []; // записи для вставки в базу данных

# Помещение массивам значения
    foreach($_POST['newMovie__genres'] as $genre){

        array_push($genre_param, $last_id, $genre); //  в массив параметров добавляем  пайди посл добавленого фильма и жанр

        $str = '(?, ?)';
        array_push($rows, $str);

    }

    #присвоение жанра фильму
    $sql_genres = 'INSERT INTO movies_genres(movie_id,
    genre_id) VALUES' . implode($rows, ','); // обьединение в строку с елементами массива, конкатенация с запросом

#Подготовление запроса и в execute передача массива с параметрами
    $stmt_genres = $pdo->prepare($sql_genres);
    $stmt_genres->execute($genre_param);

#Фиксированние изменений в базу данных

    $pdo->commit();

    echo 'Новый фильм успешно добавлен!';


}catch(PDOException $e){ // при ошибке

    echo 'Во время добавления фильма произошла ошибка:' . $e->getMessage();

$pdo->rollBack(); //откат транзакции
#в случае ошибки возврат к исходному состоянию до транзакции

}

function getNakedInput($input){ // функция для обработки пользывательского ввода
    return htmlentities(trim($input)); //вызов trim & htmlentities и передача параметра $input как аргумент и возврат
}
