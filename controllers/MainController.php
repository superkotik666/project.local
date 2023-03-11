<?php

    namespace controllers;
    use core\Controller;
    use lib\Db;
    use models\Main;

    class MainController extends Controller {

    public function authAction() {
	$this->view->render('Вход в Пустоту' );
	$this->model->checkAuth ();	
	}
	
    public function authAction() {
	$this->view->render('Вход в Пустоту' );
	$this->model->checkconnect();	
	}
    }
        
        ?>
