<?
	header('Content-Type: text/html; charset=UTF-8');
	mb_internal_encoding('UTF-8');
	session_start();
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	define('ROOT', dirname(__FILE__));

	require_once(ROOT.'/components/Db.php');
	$db = new DB();

	require_once(ROOT.'/models/User.php');
	$user = new User();

	require_once(ROOT.'/models/Task.php');
	$task = new Task();

	require_once(ROOT.'/components/Router.php');
	$router = new Router();
	
	$router -> run();