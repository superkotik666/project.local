<?php
   namespace models;
   use core\Model;
   use lib\Db;

   class Main extends Model {

   public function checkAuth (){
     if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $log = $this->db->column("SELECT * FROM users WHERE login='$login'");
        $pass = $this->db->column("SELECT * FROM users WHERE password='$password'");
        
     if (!empty($log) && !empty($pass)) {
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
  
  
  public function checkconnect (){
     if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $mail = $_POST['email'];
        $statement = $this->db->column("SELECT * FROM users WHERE login='$login'");
    
    //проверка на использование вводимого логина
    
      if (empty($statement)) {
        $this->db->column("INSERT INTO users SET login='$login', password='$password' , email ='$mail'");
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
  }


    
