<!--Шапка сайта-->
<header>
    <nav>
        <?php if( isset($_SESSION['user_login']) ): ?> <!--альтернативный синтаксис для смены шапки в зависимости от статуса пользывателя(вошел/нет)-->
            <a href="index.php">Главная</a>
            <a href="movies.php">Фильмы</a>
        <?php else: ?>
            <a href="signin.php">Авторизироваться</a>
            <a href="signup.php">Зарегистрироваться</a>
        <?php endif; ?>
    </nav>
</header>
<hr>
