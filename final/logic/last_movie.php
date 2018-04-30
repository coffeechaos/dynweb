<?php
require_once 'db.php';

 // Достаем id и title из последней добавленной записи
$sql = 'SELECT id, title FROM movies ORDER BY id DESC
LIMIT 1'; // сортировка результата по id в порядке убывания ORDER BY, DESC

$result = $pdo->query($sql); // запрос
$movie = $result->fetch(PDO::FETCH_OBJ); // извлекаем результат
?>

<h4>
    <a href=<?php echo 'movies.php#movie_' .
    $movie->id; ?> ><?php echo $movie->title; ?></a> <!--ссылка на последний фильм с идентификатором movie_ айди фильма и названием фильма-->
</h4>
