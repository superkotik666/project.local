    <?php
    namespace models;
    use core\Model;
    use lib\Db;

    class Main extends Model {

    public function checkconnect (){
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $statement = $this->db->column("SELECT * FROM users WHERE login='$login'");
    // необходимо добавить хеширование паролей и проверку хеширование при аутентификации
    if (empty($statement)) {
    $this->db->column("INSERT INTO users SET login='$login', password='$password'");
    $_SESSION['auth'] = true;
    $_SESSION['login'] = $_REQUEST['login']; 
    $addr = '/forum';
    header("Location: $addr");
    } else {
    echo 'Такой логин уже используется';
    }}}}

    ?>


    
