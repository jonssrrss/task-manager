<?
    $name_selected = 'Все';
    $email_selected = 'Все';
    $status_selected = 'Все';

    if (isset($_GET['applyFilter'])) {
        $name_selected = $_GET['username'];
        $email_selected = $_GET['email'];
        $status_selected = $_GET['status'];
    }

    $names = Filter::getUserNames();
    $emails = Filter::getUserEmails();
    $statuses = Filter::getStatuses();
?>

<form class="filter">

    <label for="username">Имя пользователя</label>
    <select name="username">
        <? foreach ($names as $key => $name) { ?>
            <option<? echo $name_selected == $name['name'] ? ' selected' : ''; ?>><?=$name['name'];?></option>
        <? } ?>
    </select>

    <label for="email">Email</label>
    <select name="email">
        <? foreach ($emails as $key => $email) { ?>
            <option<? echo $email_selected == $email['email'] ? ' selected' : ''; ?>><?=$email['email'];?></option>
        <? } ?>
    </select>

    <label for="status">Статус</label>
    <select name="status">
        <? foreach ($statuses as $key => $status) { ?>
            <option<? echo $status_selected == $status['name'] ? ' selected' : ''; ?>><?=$status['name'];?></option>
        <? } ?>
    </select>

    <br>

    <label for="dateCreate">Дата постановки (от)</label>
    <input type="date" name="dateCreate_start" value="<?=@$_GET['dateCreate_start'];?>">

    <label for="timeCreate">Время постановки (от)</label>
    <input type="time" name="timeCreate_start" value="<?=@$_GET['timeCreate_start'];?>">

    <br>

    <label for="dateCreate">Дата постановки (до)</label>
    <input type="date" name="dateCreate_end" value="<?=@$_GET['dateCreate_end'];?>">

    <label for="timeCreate">Время постановки (до)</label>
    <input type="time" name="timeCreate_end" value="<?=@$_GET['timeCreate_end'];?>">

    <br>
    <button name="applyFilter" value="true">Применить</button>
    <br>
    <a href="/">Сбросить</a>
    

</form>