<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовая работа для "Доставка-сервис"</title>
    <link rel="stylesheet" href="/assets/css/style.css?v=1">
</head>
<body>

    <div class="wrapper">
        <header>
            <a href="/">Главная</a>
            <?
                if ($user::isAuth()) {
                    echo '<div><a href="/logout">Выход</a></div>';
                } else {
                    echo '<div><a href="/login">Вход для администратора</a></div>';
                }
            ?>
        </header>
        <? require_once($contentFile); ?>
    </div>

</body>
</html>