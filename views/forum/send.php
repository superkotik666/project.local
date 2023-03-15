<p> ФОРУМ </p>
<style>

* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
body {
    margin: 30px;
    font-family: Arial, Helvetica, sans-serif;
}
input, textarea {
     width: 400px;
     margin: 5px;
}
form {
    display: flex;
    flex-direction: column;
}
</style>

<?php foreach ($news as $val): ?> 
 <h3> <?php echo $val['title']; ?> </h3>
 <p> <?php echo $val['description']; ?> </p>
 <hr>
 <?php endforeach ;?>

<p> <?php
if (!empty($_SESSION['login'])){
echo $_SESSION['login'];
} else echo'ерунда какая-то';
?> </p>

<form action="" method="POST">
 <button type="input" name="buttonExit" class="btn btn-danger">Выход</button>
 </form>

<form action="" method="POST">

<textarea name="comment" cols="10" rows="10" placeholder="Пишите ,на здоровье, ваши комментарии :)" required></textarea>
<input type="submit">

</form>

<hr>

<h2>Форум</h2>

