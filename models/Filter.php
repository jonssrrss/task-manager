<?

    /**
     * Фильтр
     */
    class Filter
    {
        /**
         * Получить список имен для фильтра
         */
        public static function getUserNames()
        {
            global $db;

            $query = "
                SELECT
                    distinct(name)
                FROM
                    users
            ";
        
            $names = $db->query($query);
        
            $names = array_merge([['name' => 'Все']], $names);

            return $names;
        }

        /**
         * Получить список email-адресов для фильтра
         */
        public static function getUserEmails()
        {
            global $db;

            $query = "
                SELECT
                    distinct(email)
                FROM
                    users
            ";
        
            $emails = $db->query($query);
        
            $emails = array_merge([['email' => 'Все']], $emails);

            return $emails;
        }

        /**
         * Получить список статусов
         */
        public static function getStatuses()
        {
            global $db;

            $query = "
                SELECT
                    name
                FROM
                    task_statuses
            ";
        
            $statuses = $db->query($query);
        
            $statuses = array_merge([['name' => 'Все']], $statuses);

            return $statuses;
        }
    }