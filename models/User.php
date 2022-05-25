<?

    /**
     * Работа с пользователем
     */
    class User
    {

        /**
         * Проверка авторизованности пользователя
         */
        public static function isAuth()
        {
            return isset($_SESSION['auth']);
        }

        /**
         * Авторизация (для админа)
         */
        public static function login($username, $password)
        {
            if ($username == "admin" && $password == "123") {
                $_SESSION['auth'] = true;
                return true;
            }

            return false;
        }

        /**
         * Новый пользователь
         */
        public static function add($username, $email)
        {
            global $db;

            $query = "
                INSERT INTO `users`(`id`, `name`, `email`)
                VALUES(NULL, '" . $username . "', '" . $email . "');
            ";

            return $db->insert($query);
        }

        /**
         * Получение информации о пользователе
         */
        public static function getInfo($id)
        {
            global $db;

            $query = "
                SELECT
                    *
                FROM
                    `users`
                WHERE
                    `users`.`id` = " . $id . "
            ";

            $result = $db->query($query);

            return $result[0];
        }

        /**
         * Получение всех пользователей
         */
        public static function getList()
        {
            global $db;

            $query = "
                SELECT
                    *
                FROM
                    `users`
            ";

            $result = $db->query($query);

            return $result;
        }
        
    }