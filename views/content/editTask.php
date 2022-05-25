<p class="info"><a href="/task<?=$id?>">Назад</a></p>

<form class="add-task" method="POST" action="">

    <h3>Редактирование задачи №<?=$id?></h3>

    <label for="user">Исполнитель</label>
    <select name="user">
        <? foreach ($users as $key => $user) { ?>
            <option value="<?=$user['id'];?>"<? echo $user['id'] == $taskInfo['user_id'] ? 'selected' : ''; ?>><?=$user['name'];?> (<?=$user['email'];?>)</option>
        <? } ?>
    </select>

    <label for="taskName">Наименование задачи</label>
    <input type="text" name="taskName" value="<?=$taskInfo['task_name'];?>" disabled>

    <label for="taskText">Текст задачи</label>
    <textarea name="taskText" cols="30" rows="5"><?=$taskInfo['task_text'];?></textarea>

    <label for="dateEnd">Дата окончания</label>
    <input type="date" name="dateEnd" value="<?=date("Y-m-d", $taskInfo['date_end']);?>">

    <label for="timeEnd">Время окончания</label>
    <input type="time" step="300" name="timeEnd" value="<?=date("H:i", $taskInfo['date_end']);?>">

    <label for="status">Статус</label>
    <select name="status">
        <? foreach ($statuses as $key => $status) { ?>
            <option value="<?=$status['id'];?>"<? echo $status['id'] == $taskInfo['status_id'] ? 'selected' : ''; ?><? echo $status['editing_permitted'] == 0 ? ' disabled' : ''; ?> <? echo $taskInfo['status_id'] == $status['id'] ? 'selected' : ''; ?>><?=$status['name'];?></option>
        <? } ?>
    </select>

    <? if (isset($_POST['save-task'])) echo '<p style="color: green;">Сохранено</p>'; ?>

    <button name="save-task" value="true">Сохранить задачу</button>

</form>