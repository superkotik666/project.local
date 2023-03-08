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
	  if (!$this->model->postValidate($_POST)){
		echo ' Ошибочка!';
	  } else{
	  $id = $this->model->addNews();
	   echo 'Номер добавленной новости : ' . $id;
	        }
			
         }
    }
	 public function deleteAction() {
	    if ($this->route['id']) {
	     $this->model->postDelete($this->route['id']);
	      $this->view->redirect('forum');
	} else  echo 'Ошибка. Такого id не существует';
		
	}

}
	?>
