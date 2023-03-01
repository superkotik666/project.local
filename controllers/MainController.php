<?php

namespace controllers;
use core\Controller;
use lib\Db;
use models\Main;

class MainController extends Controller {

	public function regAction (){
		
		$this->view->render('Страница регистрации' );
		$this->model->checkconnect();
	}
	public function sendAction (){
	
	$result = $this->model->gewNews();
	$vars = ['news' => $result,];
	$this->view->render('Чатьтесь))0)', $vars);
	$this->model->checkForum();
	
	}
	
}
