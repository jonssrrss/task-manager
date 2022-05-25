<?
	return array(
		'logout' => 'index/logout',

		'login' => 'index/login',
		'new' => 'task/new',

		'task([0-9]+)/edit' => 'task/edit/$1',
		'task([0-9]+)' => 'task/view/$1',

		'' => 'index',
	);