<header>
    <nav>
        <?php if( isset($_SESSION['user_login']) ): ?>
            <a href="index.php">Главная</a>
        <?php else: ?>
            <a href="signin.php">Авторизироваться</a>
            <a href="signup.php">Зарегистрироваться</a>
        <?php endif; ?>
    </nav>
</header>
<hr>
