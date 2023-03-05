<?php

    namespace controllers;
    use core\Controller;
    use lib\Db;
    use models\Main;

    class AdminController extends Controller {

	public function showUserAction (){ 
	$this->view->render('Страница Администратора' );
	$this->model->showLogins();
	
	}
	
	// работает только по адресу: admin/delete. придумать чтобы работало по адресу: admin/page
	// то есть по одному адресу с showUserAction ()
	public function deleteUserAction (){
	$this->view->render('Страница Администратора' );
	$this->model->deleteUsers($id);
	}
    
	public function addAction (){
	$this->view->render('Страница добавления новостей');	
	if (!empty($_POST['title']) && !empty($_POST['description'])) {
	$this->model->addNews($_POST);
	}}}

	
	?>
