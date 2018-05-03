<?php
 require_once 'db.php'; // Необьязательно так как запрашен в файле movies

#запрос к базе данных
$sql = 'SELECT movies.id, movies.title,
movies.duration, GROUP_CONCAT(genres.genre SEPARATOR/*разделитель*/
", ") AS genres /*GROUP_CONCAT для групирования данных, AS для смены имени */
FROM movies INNER JOIN movies_genres
ON movies.id = movies_genres.movie_id
INNER JOIN genres
ON movies_genres.genre_id = genres.id
GROUP BY movies.id, movies.title, movies.duration';/*GROUP BY все столбцы*/
#inner join для получения содержания данных в таблице

$result = $pdo->query('SELECT * FROM movies'); // так как не передаются переменные, используется метод query, а результат помещен в переменную $result
/*$result = $pdo->query($sql); - оригинальный код запроса, не работает, 'SELECT * FROM movies' - working*/

while( $movie = $result->fetch(PDO::FETCH_OBJ) ): //цикл while при каждой итерации будет извлекать записи при помощи метода fetch c аргументом PDO::FETCH_OBJ и помещать в переменную $movie
    #альтернативный синтаксис : endif; так как будет генерироваться  html разметка в теле цикла
?>

    <!-- информация о фильме в movie__container -->
    <div class="movie__container" id=<?php echo
    'movie_' . $movie->id; ?> data-movie-id=<?php echo
    $movie->id; ?>> <!--конкатенация строк movie_ и айди текущей записи-->
<!--data-movie-id -собственный атрибут div-a, который равен идентификатору фильма-->
        <h3 class="movie__title"><?php echo
        $movie->title; ?></h3> <!--название фильма-->
        <h4 class="movie__genre"><?php echo
        $movie->genre; ?></h4><!--жанры фильма-->
        <h4 class="movie__duration">Продолжительность
        фильма: <?php echo  $movie->duration;?></h4><!--продолжительность-->

        <?php if(isset($_COOKIE['watched']) &&
        array_key_exists($movie->id,
        $_COOKIE['watched']) ): ?> <!--проверка сущевствования куки watched -->

        <button class="movie__watched movie__watched_active">Смотрел</button>

        <!--↓скритие неактивной кнопки↓-->
        <?php else: ?>
        <button class="movie__watched">Не смотрел</button>
        <?php endif; ?>
        <button type="button" class="movie__del">Удалить</button>
    </div>
    <hr> <!--разделитель блоков-->
<?php endwhile; ?>
