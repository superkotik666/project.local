<?php
namespace models;
use core\Model;
use lib\Db;

class Main extends Model {

public function ckeckAdmin(){
  if($_POST['login']=='AdmiN' && $_POST['password']=='admin123'){
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $_REQUEST['login']; 
        $addr = 'admin/page';
        header("Location: $addr");
  } 
}          
        
public function registration(){
        $login = $_POST['login'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $mail = $_POST['email'];
        $this->db->column("INSERT INTO users SET login='$login', password='$password' , email ='$mail'");
    }

public function checkLoginExists() {
        $login = $_POST['login'];
        $statement = $this->db->column("SELECT * FROM users WHERE login='$login'");
    if (empty($statement)){
        return true;
   }
 }

public function checkconnect (){
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
       if ($this->checkLoginExists()) { 
         $this->registration();
         $_SESSION['auth'] = true;
         $_SESSION['login'] = $_REQUEST['login']; 
         $addr = '/forum';
         header("Location: $addr");
  } 
    else {
       echo 'Такой логин уже используется';
     }
   }
 }

public function checkHash(){
       $login = $_POST['login'];
       $hash = $this->db->column("SELECT password FROM users WHERE login ='$login'");
    if (password_verify($_POST['password'],$hash )){
       return true;
  }
}

public function checkAuth (){
      $this->ckeckAdmin();
      if (!empty($_POST['login']) && !empty($_POST['password'])) {
      if ($this->checkHash()){
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $_REQUEST['login']; 
        $addr = '/forum';
        header("Location: $addr");
      }
      else {
        echo 'Введен неправильный логин или пароль';
      }
   }
 }
}
 
?>


    
