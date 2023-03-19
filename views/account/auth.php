<h2> ФОРУМ ДЛЯ ВСЕХ ЖЕЛАЮЩИХ </h2>
<h3> Welcome!</h3>
<form action="" method="POST">
<p> Введите логин </p>
<input name="login">
<p> Введите пароль </p>
<input name="password" type="password">
<button type="input" class="btn btn-primary">Войти</button>

 </form>
 
 <p> <a href="http://framework.local/registration" target="_self">Еще не завели аккаунт? Тогда зарегистрируйтесь!</a> </p>
 
 <?php var_dump(password_hash('admin123', PASSWORD_DEFAULT)); ?>
 
 <p> <?php var_dump(password_hash('artem', PASSWORD_DEFAULT)); ?> </p>
