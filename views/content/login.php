<form class="auth" action="/" method="POST">

    <h2>Авторизация</h2>

    <p>Логин и пароль:</p>
    <strong>admin/123</strong>

    <label for="username">Логин</label>
    <input name="username" type="text" value="<?=@$_POST['username']?>">

    <label for="password">Пароль</label>
    <input name="password" type="password">

    <? if (isset($_POST['login'])) { ?>

        <p class="error">Неверный логин/пароль</p>
        
    <? } ?>

    <button name="login">Войти</button>

</form>