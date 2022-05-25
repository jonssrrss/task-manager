<?
	class IndexController
	{

		public static function action()
		{
			global $user;
			global $task;

			require_once(ROOT.'/lib/functions.php');

			if (isset($_POST['login'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
	
				$user::login($username, $password);
			} elseif (isset($_POST['new-task'])) {
				$username = $_POST['name'];
				$email = $_POST['email'];
				$taskName = $_POST['taskName'];
				$taskText = $_POST['taskText'];
				$dateEnd = $_POST['dateEnd'];
				$timeEnd = $_POST['timeEnd'];

				$task::add(
					$username,
					$email,
					$taskName,
					$taskText,
					$dateEnd,
					$timeEnd
				);
			}

			$tasks = $task::getList(1, 3);

			$taskListHtml = $task::getListHtml(
				$tasks['list']
			);

			require_once(ROOT.'/models/Filter.php');

			require_once(ROOT.'/models/Pagination.php');

			$pagination = Pagination::getHtml($tasks['count']);
			
			$contentFile = ROOT.'/views/content/main.php';

			require_once ROOT.'/views/template/index.php';
		}

		public static function actionLogin()
		{
			global $user;

			if (!$user::isAuth())
				$contentFile = ROOT.'/views/content/login.php';
			else
				header('Location: /');

			require_once ROOT.'/views/template/index.php';
		}
		
		public static function actionLogout()
		{
			session_destroy();
			header('Location: /');
		}

	}