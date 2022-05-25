<form class="add-task" method="POST" action="/">

    <h3>Добавить новую задачу</h3>

    <label for="name">Ваше имя</label>
    <input type="text" name="name">

    <label for="email">Ваша почта</label>
    <input type="text" name="email">

    <label for="taskName">Наименование задачи</label>
    <input type="text" name="taskName">

    <label for="taskText">Текст задачи</label>
    <textarea name="taskText" cols="30" rows="5"></textarea>

    <label for="dateEnd">Дата окончания</label>
    <input type="date" name="dateEnd">

    <label for="timeEnd">Время окончания</label>
    <input type="time" step="300" name="timeEnd">

    <button name="new-task">Сохранить задачу</button>

</form>