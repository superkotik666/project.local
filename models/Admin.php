    <?php
    namespace models;
    use core\Model;
    use lib\Db;
  
    class Admin extends Model {

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
  
    public function addNews($post){
    
    $title = $_POST['title'] ; 
    $description = $_POST['description'];
    
    $this->db->query("INSERT INTO news SET title ='$title', description='$description'"); 
    return $this->db->lastInsertId();
    }}

    ?>

    
