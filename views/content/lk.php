<form class="auth" action="/lk" method="POST">

    <h2>Личный кабинет</h2>

    <label for="lname">Фамилия</label>
    <input name="lname" type="text" value="<?=@$userInfo['lname']?>">

    <label for="fname">Имя</label>
    <input name="fname" type="text" value="<?=@$userInfo['fname']?>">

    <label for="mname">Отчество</label>
    <input name="mname" type="text" value="<?=@$userInfo['mname']?>">

    <label for="email">Email</label>
    <input name="email" type="text" value="<?=@$userInfo['email']?>">

    <label for="username">Логин</label>
    <input name="username" type="text" value="<?=@$userInfo['login']?>">

    <label for="password">Пароль</label>
    <input name="password" type="password">

    <label for="password2">Повторите пароль</label>
    <input name="password2" type="password">

    <? if (isset($userInfo['update'])) { ?>

        <p class="error">Введите правильные данные</p>
        
    <? } ?>

    <button name="update">Сохранить</button>

</form>