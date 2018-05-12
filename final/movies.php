<?php require_once 'logic/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="data:image/x-icon" type="image/x-icon"> <!--убирает ошибку favicon.ico 404 (Not Found)-->
	<?php require_once 'parts/head.php'; ?>
</head>
	<body>
		<?php  include_once 'parts/header.php'; ?>
	    <?php if (isset($_SESSION['user_login']) ): ?>
				<!--*счетчик просмотренных фильмов*-->
	            <h3>Всего просмотренно фильмов: <span id="watched-count">
	            <?php if( isset($_COOKIE['watched']) ):
	                echo count($_COOKIE['watched']);
	            else:
	                echo 0;
	            endif;
	                ?>
	            </span></h3>
	        <section id='movies-sec'> <!--Подключения файла с данными для вывода-->
	            <?php include_once 'logic/print_movies.php'; ?>
	        </section>
	        <?php else: ?>
	            <?php include_once 'parts/not_auth.php';?> <!-- Подключить файл запрета доступак странице not_auth -->
	        <?php endif; ?>
	</body>
</html>
