<?php

        namespace controllers;
        use core\Controller;
        use lib\Db;
        use models\Forum;

        class ForumController extends Controller {

	public function sendAction (){
	
	   if(isset($_POST['buttonExit'])){
	      $this->model->logoutAction();
	}
		
	$result = $this->model->gewNews();
	$vars = ['news' => $result,];
	$this->view->render('Чатьтесь))0)', $vars);
	$this->model->checkForum();
	}}
	
	?>
