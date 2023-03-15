<?php
namespace models;
    use core\Model;
    use lib\Db;
  
    class Admin extends Model {

    public $error;

    public $logins; //придумать зачем здесь это свойство
    
    public function showLogins() {
    
    $logins = $this->db->row("SELECT `id` , `login` FROM users");
    $logins= array_column($logins , 'login' , 'id' );
    foreach ($logins as $login => $id){
    echo "<pre>";
    echo $login . ' : ' . $id;
    echo "</pre>";
    }}
    
    public function deleteUsers($id){
    $this->db->query("DELETE FROM users WHERE id='$id'");
    } 
  
    public function addNews(){
    
    $title = $_POST['title'] ; 
    $description = $_POST['description'];
    
    $this->db->query("INSERT INTO news SET title ='$title', description='$description'"); 
    return $this->db->lastInsertId();
    }

    
    public function postValidate($post) {
		$titleLen = iconv_strlen($post['title']);
		$descriptionLen = iconv_strlen($post['description']);
		   if ($titleLen < 3 or $titleLen > 100) {
			     echo 'Заголовок должен содержать от 3 до 100 символов.';
			return false;
		} elseif ($descriptionLen < 3 or $descriptionLen > 300) {
			     echo 'Описание должно содержать от 3 до 300 символов.';
      return false;
		} 
      return true ;
		
		
	}
    public function postDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM news WHERE id = :id', $params);
        
		
	}



}

    
