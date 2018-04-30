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
            <h1>Добро пожаловать, <?php echo $_SESSION['user_login']; ?> </h1> <!--Приветствие и логин пользывателя-->
            <a href="logic/logout.php">Выйти из аккаунта</a><!--Выход-->
            <br>

			<h3>Последний добавленный файл:</h3>
			<?php include_once 'logic/last_movie.php'; ?>

			<!--кнопка которая будет будет отображать предыдущий добавленный фильм-->
			<hr>
			<button type="button" id="showMore">Показать еще</button>


	        <?php else: ?>
	            <?php include_once 'parts/not_auth.php'?> <!--Подключить файл запрета доступак странице not_auth-->
	    	<?php endif; ?>


</body>
</html>
