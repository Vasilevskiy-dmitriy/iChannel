<?php

use lib\db;

setcookie('NameE_OExist', 'none');
setcookie('YourName', 'none');        
setcookie('editNameA', 'none');

setcookie('YourPasswordFalse_O', 'none');
setcookie('YourPassw', 'none');
setcookie('editPasswA', 'none');

?>

<div class="container_Office">

    <div class="flex">
        <img src="/project/img/<?=$_SESSION['img']?>" alt="" class="img_Office">
    </div>

    <div class="content_Office">

        <div class="name_Office">
            Ваше имя:
        </div>

        <h3 style="color:red; font-size:12px; display:<?=$_COOKIE['NameE_OExist']?>;">Такое имя уже есть</h3>
        <h3 style="color:red; font-size:12px; display:<?=$_COOKIE['YourName']?>;">Это же ваш ник!</h3>
        <h3 style="color:green; font-size:12px; display:<?=$_COOKIE['editNameA']?>;">Ваш ник изменен успешно!</h3>

        <form class="form_Office" action="/editnameAccount" method="post">
            <input class="in_n_O" type="name" name="name"  value="<?=$_SESSION['name']?>" required>
            <input class="in_b_O" type="submit" value="Сменить">
        </form>

        <div class="password_Office">

            <div class="name_Office">
                Изменить пароль:
            </div>

            <form class="form_Office" action="/editpasswordAccount" method="post">

            <h3 style="color:red; font-size:12px; display:<?=$_COOKIE['YourPasswordFalse_O']?>;">Ваш старый пароль не правильный!</h3>
            <h3 style="color:red; font-size:12px; display:<?=$_COOKIE['YourPassw']?>;">Нельзя поменять пароль на схожий с вашим старым!</h3>
            <h3 style="color:green; font-size:12px; display:<?=$_COOKIE['editPasswA']?>;">Ваш пароль изменен успешно!</h3>
        
            <div class="n_p_f_i">Ваш пароль:</div>
            <input class="in_p_O" type="password"name="password" value="" required>
            <div class="n_p_f_i">Ваш новый пароль:</div>
            <input class="in_p_O" type="password" name="new_password" value="" required>
            <input class="in_b_O" type="submit" value="Сменить">

            </form>

        </div>

        <div class="comment_Office">
            <div class="content_comments" style="width:100%; margin-top:25px">
                <div class="title_comments">Мои коментарии:(<?=count($arrayCom)?>)</div>

                    <?php foreach($arrayCom as $arr):?>

                    <?php $name_p = ( new db )->querygetNewsId('news', $arr['page_id']);?>

                        <div class="container_comm">

                            <div>

                            <div class="name_comment">
                                <div class="F_P">К посту о: 
                                    <a href="/page/<?=$arr['page_id']?>"><?php echo $name_p['title']?></a>
                                </div>
                            </div>
                            <div class="text_comm_cont"><?=$arr['text']?></div>
                            <div class="time_comm"><?=$arr['time']?></div>
                            
                            <?php if(trim($arr['name']) === trim($_SESSION['name'])):?>
                            <a style="color: red;font-weight: 900;font-size: 12px;margin-top: 10px;" href="/deleteCom/<?=$arr['id']?>">Delete</a>
                            <?php endif?>

                            </div>

                        </div>

                    <?php endforeach?>
        </div>

        </div>

    </div>

</div>