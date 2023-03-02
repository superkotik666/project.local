        <?php

        namespace models;
        use core\Model;
        use lib\Db;

        class Forum extends Model {

	public function gewNews(){
        $result = $this->db->row('SELECT title, description FROM news');
        return $result;
        }
        public function checkForum(){
        if (isset($_POST['comment'])){
        
        $username = $_SESSION['login'];
        $comment = $_POST['comment'];
        $date = date('Y-m-d H:i:s');
        $query = $this->db->query("INSERT INTO myforum.comments (username, comment, date) VALUES ('$username', '$comment', '$date')");
        
        if ($query){
        echo '<pre>';
        echo 'Successful!';
        echo '</pre>';
        } else {
        echo 'Проблемы в коде в моменте отправки форм (написании сообщения)';
        }}
        $comments = $this->db->query("SELECT * FROM myforum.comments ORDER BY date DESC");
        
        if ($_SESSION['auth']) {
        echo 'Пользователь авторизирован';
        
        if ($comments){
        foreach ($comments as $comm){
        ?>
        <p> <?= "{$comm['date']} '{$comm['username']}' оставил комментарий: '{$comm['comment']}'" ?> </p>
        <?php } } else { ?>
        <p>Здесь пока нет комментариев</p>
        <?php } 
        } else { 
        echo '<pre>';
        echo 'Авторизация не пройдена';
        echo '</pre>';
        };
        }}
        
        ?>

    
