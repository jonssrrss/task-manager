<?
	class TaskController
	{

		public static function actionView($id)
		{
			global $user;
			global $task;

			$taskInfo = $task::getInfo($id);

			$contentFile = ROOT.'/views/content/task.php';

			require_once ROOT.'/views/template/index.php';
		}

		public static function actionEdit($id)
		{
            global $user;

			if (!$user::isAuth())
				header('Location: /');
				
			if ($user::isAuth() && isset($_POST['save-task'])) {
				$user_id = $_POST['user'];
				$task_text = $_POST['taskText'];
				$date = $_POST['dateEnd'];
				$time = $_POST['timeEnd'];
				$status_id = false;
				if (isset($_POST['status']))
					$status_id = $_POST['status'];

				Task::save($id, $user_id, $task_text, $date, $time, $status_id);
			}
            
            $contentFile = ROOT.'/views/content/editTask.php';

			$taskInfo = Task::getInfo($id);
			$users = User::getList();
			$statuses = Task::getStatusList();
			
			require_once ROOT.'/views/template/index.php';
		}

		public static function actionNew()
		{
            global $user;
            
            $contentFile = ROOT.'/views/content/newTask.php';
			
			require_once ROOT.'/views/template/index.php';
		}

	}