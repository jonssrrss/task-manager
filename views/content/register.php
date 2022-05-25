<form class="auth" action="/register" method="POST">

    <h2>Регистрация</h2>

    <label for="lname">Фамилия</label>
    <input name="lname" type="text" value="<?=@$_POST['lname']?>">

    <label for="fname">Имя</label>
    <input name="fname" type="text" value="<?=@$_POST['fname']?>">

    <label for="mname">Отчество</label>
    <input name="mname" type="text" value="<?=@$_POST['mname']?>">

    <label for="email">Email</label>
    <input name="email" type="text" value="<?=@$_POST['email']?>">

    <label for="username">Придумайте логин</label>
    <input name="username" type="text" value="<?=@$_POST['username']?>">

    <label for="password">Пароль</label>
    <input name="password" type="password">

    <label for="password2">Повторите пароль</label>
    <input name="password2" type="password">

    <? if (isset($_POST['register'])) { ?>

        <p class="error">Введите правильные данные</p>
        
    <? } ?>

    <button name="register">Зарегистрироваться</button>

    <p><a href="/">Авторизация</a></p>

</form>