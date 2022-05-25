<?
	/**
	 * Работа с бд
	 */
	class DB {
		public $db_connection;

		public function __construct()
		{
			$this->db_connection = $this->getConnection();
		}

		public function getConnection()
		{
			$paramsPath = ROOT.'/config/db_params.php';
			$params = include($paramsPath);
			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']};charset=utf8";
			
			return new PDO(
				$dsn,
				$params['user'],
				$params['password']
			);
		}

		public function query($query)
		{
			$res = $this->db_connection->query($query);
			$res->setFetchMode(PDO::FETCH_ASSOC);

			$arr = [];
			while ($row = $res->fetch()) {
				$arr[] = $row;
			}

			return $arr;
		}

		public function insert($query) {
			$result = $this->db_connection -> query($query);
			return $this->db_connection -> lastInsertId();
		}
	}