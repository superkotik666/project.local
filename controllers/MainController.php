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
	
    public function regAction (){
        $this->view->render('Страница регистрации' );
        $this->model->checkconnect();
       }
    }
        
        ?>
