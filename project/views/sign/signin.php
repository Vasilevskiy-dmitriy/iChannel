<?php
setcookie('loginNotExist', 'none');
setcookie('passwordFalse', 'none');
?>
<title>Авторизация</title>
<div class="log_out">
    <div class="from_log_out">

        <form class="form_log" action="/actionSignIn" method="post">

            <h1 class="h1_log">Вход в профиль</h1>
            <h2 class="check" style="color:red; display:<?=$_COOKIE['loginNotExist']?>;" >This Email dont exist</h2>
            <h2 class="check" style="color:red; display:<?=$_COOKIE['passwordFalse']?>;" >This Password dont exist</h2>
            <input class="em_log" type="email" placeholder="email" name="email" id="email" required>
            <input class="pass_log" type="password" placeholder="password" name="password" id="password" required>
            <input class="sum_log" type="submit" value="Войти">
            <a class="reg_sub_log" href="/signup">Зарегистрироваться</a>
            <a class="a_log" href="/">Востановить пароль</a>

        </form>
    </div>
</div>
