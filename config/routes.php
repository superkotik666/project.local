<?php

return [
	
	'' => [
		'controller' => 'main',
		'action' => 'reg',
	],
	
	'forum' => [
		'controller' => 'forum',
		'action' => 'send',
	],
	
	'admin/addnews' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	
	'admin/delete' => [
		'controller' => 'admin',
		'action' => 'deleteUser',
	],
	
	'admin/page' => [
		'controller' => 'admin',
		'action' => 'showUser',
	],
	'posts/delete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
];

?>
