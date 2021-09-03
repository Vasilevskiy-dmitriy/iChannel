<?setcookie('EmailExist', 'none')?>
<?setcookie('NameExist', 'none')?>
<div class="log_out">
    <div class="from_log_out">
        <form class="form_log" action="/actionSignup" method="post" enctype="multipart/form-data" >
            <h1 class="h1_log">Регистрация</h1>
            <h2 class="check" style="color:red; display:<?=$_COOKIE['EmailExist']?>;" >Этот email уже существует</h2>
            <h2 class="check" style="color:red; display:<?=$_COOKIE['NameExist']?>;" >Этот Ник уже существует</h2>
            <input class="em_log" type="email" placeholder="email" name="email" id="email" required >
            <input class="name_reg_style" type="text" placeholder="введите ваше имя" name="name" id="" required>
            <input class="pass_log" type="password" placeholder="password" name="password" id="password" required>
            <input type="file" class="f_k" name="image" id=""> 
            <input style="background: #2e2e2e;" class="sum_log" type="submit" value="Зарегистрироваться">
        </form>
    </div>
</div>