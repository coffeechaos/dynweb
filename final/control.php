<?php require_once 'logic/db.php'; ?> <!--подключение базы данных db.php-->
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="data:image/x-icon" type="image/x-icon"> <!--убирает ошибку favicon.ico 404 (Not Found)-->
	<?php require_once 'parts/head.php'; ?> <!-- запрос файла head.php-->
</head>
<body>
	<?php  include_once 'parts/header.php'; ?> <!--Подключение шапки-->
    <?php if (isset($_SESSION['user_login']) ): ?> <!-- условие if вместо {} - : endif; -->
			<h1>Добавить фильм</h1>
            <form name ="newMovie" class="" action="index.html" method="post">
            	<label for="">Название фильма</label>
				<input type="text" name="newMovie__title" value="">
				<br>
				<label for="">Продолжительность фильма</label>
				<input type="number" name="newMovie__duration" value="">
				<br>
				<label for="">Жанры фильма</label>
				<select name="newMovie__genres[]" multiple><!--[] - чтобы при выборе нескольких жанров на сервер отправились все выбранные жанры-->
					<?php include_once 'logic/get_genres.php'; ?>
				</select>
				<br>
				<button type="submit">Добавить</button>
            </form>


	        <?php else: ?>
	            <?php include_once 'parts/not_auth.php'?> <!--Подключить файл запрета доступак странице not_auth-->
	    	<?php endif; ?>


</body>
</html>
