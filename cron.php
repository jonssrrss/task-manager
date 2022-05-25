<?
	define('ROOT', dirname(__FILE__));

	require_once(ROOT.'/components/Db.php');

	$db = new DB();

    $query = "
        UPDATE
            `tasks`
        SET
            status_id = '2'
        WHERE
            tasks.date_end > " . time() . ";

        UPDATE
            `tasks`
        SET
            status_id = '4'
        WHERE
            tasks.date_end < " . time() . " AND
            tasks.status_id != 3 AND
            tasks.status_id != 5;
    ";

    $db->query($query);