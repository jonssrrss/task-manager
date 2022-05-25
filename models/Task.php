<?

    /**
     * Работа с задачами
     */
    class Task
    {

        /**
         * Новая задача
         */
        public static function add($username, $email, $taskName, $taskText, $dateEnd, $timeEnd)
        {
            global $db;
            global $user;

            $user_id = $user::add($username, $email);
            $vowels = array("'", '"', '!', '--', '<', '>', '#', '$', '*', '{', '}');

            $query = "
                INSERT INTO `tasks`(
                    `id`,
                    `name`,
                    `text`,
                    `user_id`,
                    `date_create`,
                    `date_end`,
                    `status_id`
                )
                VALUES(
                    NULL,
                    '" . str_replace($vowels, "", htmlspecialchars($taskName)) . "',
                    '" . str_replace($vowels, "", htmlspecialchars($taskText)) . "',
                    '" . $user_id . "',
                    '" . time() . "',
                    '" . strtotime($dateEnd . " " . $timeEnd) . "',
                    '1'
                );
            ";

            $result = $db->query($query);

            return true;
        }

        /**
         * Сохранение задачи
         */
        public static function save($task_id, $user_id, $task_text, $date, $time, $status_id)
        {
            global $db;

            $vowels = array("'", '"', '!', '--', '<', '>', '#', '$', '*', '{', '}');

            $date_end = strtotime($date . " " . $time);

            if ($date_end < time())
                $status_id = 3;

            $query = "
                UPDATE
                    `tasks`
                SET
                    `text` = '" . str_replace($vowels, "", htmlspecialchars($task_text)) . "',
                    `user_id` = '" . $user_id . "',
                    `date_end` = '" . $date_end . "'
                    " . ($status_id != false ? ", `status_id` = '" . $status_id . "'" : '') . "
                WHERE
                    `tasks`.`id` = " . $task_id . "
            ";

            $db->query($query);
        }

        /**
         * Получить все задачи массивом
         * @page - страница
         * @countItems - количество выводимых записей
         */
        public static function getList($page, $countItems)
        {
            global $db;

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $startItems = ($page-1)*3;

            $filter = [];

            if (isset($_GET['applyFilter'])) {
                if ($_GET['username'] != 'Все') {
                    $filter[] = 'u.name = ' . '\'' . $_GET['username'] . '\'';
                }

                if ($_GET['email'] != 'Все') {
                    $filter[] = 'u.email = ' . '\'' . $_GET['email'] . '\'';
                }

                if ($_GET['status'] != 'Все') {
                    $filter[] = 'ts.name = ' . '\'' . $_GET['status'] . '\'';
                }

                if (!empty($_GET['dateCreate_start'])) {
                    $filter[] = 't.date_create >= ' . strtotime($_GET['dateCreate_start'] . " " . $_GET['timeCreate_start']);
                }

                if (!empty($_GET['dateCreate_end'])) {
                    $filter[] = 't.date_create <= ' . strtotime($_GET['dateCreate_end'] . " " . $_GET['timeCreate_end']);
                }
            }

            $query = "
                SELECT
                    COUNT(t.id) AS 'count'
                FROM
                    tasks t
                    LEFT JOIN users u ON u.id = t.user_id
                    LEFT JOIN task_statuses ts ON ts.id = t.status_id
                " . (count($filter) > 0 ? 'WHERE ' . implode(' AND ', $filter) : '')
            ;

            $countTasks = $db->query($query)[0]['count'];

            $query = "
                SELECT
                    t.id,
                    t.name AS 'task_name',
                    u.name AS 'user_name',
                    u.email AS 'user_email',
                    t.date_create,
                    t.date_end,
                    ts.name AS 'status_name'
                FROM
                    tasks t
                    LEFT JOIN users u ON u.id = t.user_id
                    LEFT JOIN task_statuses ts ON ts.id = t.status_id
                " . (count($filter) > 0 ? 'WHERE ' . implode(' AND ', $filter) : '') . "
                ORDER BY t.id
                LIMIT " . $startItems . ", " . $countItems . "
            ";

            return ['list' => $db->query($query), 'count' => $countTasks];
        }

        /**
         * Формирование таблицы с задачами
         */
        public static function getListHtml($list)
        {
            $html = '
                <table border="1px">
                    <tbody>
            
                        <tr>
                            <th>№</th>
                            <th>Наименование</th>
                            <th>Постановщик</th>
                            <th>Email</th>
                            <th>Дата и время (постановка)</th>
                            <th>Дата и время (срок)</th>
                            <th>Статус</th>
                        </tr>
            ';

            foreach ($list as $key => $taskItem) {
                $html .= '
                    <tr>
                        <td><a href="task' . $taskItem['id'] . '">' . $taskItem['id'] . '</a></td>
                        <td>' . $taskItem['task_name'] . '</td>
                        <td>' . $taskItem['user_name'] . '</td>
                        <td>' . $taskItem['user_email'] . '</td>
                        <td>' . date("d.m.Y H:i", $taskItem['date_create']) . '</td>
                        <td>' . date("d.m.Y H:i", $taskItem['date_end']) . '</td>
                        <td>' . $taskItem['status_name'] . '</td>
                    </tr>
                ';
            }
            
            $html .= '
                    </tbody>
                </table>
            ';

            return $html;
        }

        /**
         * Получение информации о задаче
         */
        public static function getInfo($id)
        {
            global $db;

            $query = "
                SELECT
                    t.id,
                    t.name AS 'task_name',
                    t.text AS 'task_text',
                    u.id AS 'user_id',
                    u.name AS 'user_name',
                    u.email AS 'user_email',
                    u.email AS 'user_email',
                    t.date_create,
                    t.date_end,
                    ts.id AS 'status_id',
                    ts.name AS 'status_name'
                FROM
                    tasks t
                    LEFT JOIN users u ON u.id = t.user_id
                    LEFT JOIN task_statuses ts ON ts.id = t.status_id
                WHERE
                    t.id = " . $id . "
            ";

            $result = $db->query($query);

            return $result[0];
        }

        /**
         * Получить статусы
         */
        public static function getStatusList()
        {
            global $db;

            $query = "
                SELECT
                    *
                FROM
                    `task_statuses`
            ";

            $result = $db->query($query);

            return $result;
        }
        
    }