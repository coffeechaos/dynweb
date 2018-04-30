<?php
require_once 'db.php';

$offset = (int) $_POST['last_shown_movie']; // помещение пересылаемых данных в переменную $offset и преобразование в число (int)

$sql = 'SELECT id, title FROM movies ORDER BY id DESC
LIMIT :lastShown, 1'; // сортировка результата по id в порядке убывания ORDER BY, DESC

$stmt = $pdo->prepare($sql); // запрос

/*$stmt->execute([$offset]); //можно передать только числа //выполнить*/

$stmt->bindValue(':lastShown', $offset, PDO::PARAM_INT);//присвоить значение плейсхолдеру(placeholder) // параметры - имя, значение, тип данных

$stmt->execute();

$movie = $stmt->fetch(PDO::FETCH_ASSOC);//поместим данных в виде ассоциативного массивав переменную movie

header('Content-Type: application/json');//заголовок ответа

# json текстовый формат данных как js обьекты но не такой же
echo json_encode($movie); //вернем ответ закодировав $movie в формат json_encode
