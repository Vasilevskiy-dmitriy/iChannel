<title><?=$array['title']?></title>

<main style="display: flex;">
    <div class="container_news">
        
        <div class="title_news"><?=$array['title']?></div>
        <div style="margin:20px 0; display:flex;">
        <a href="/category/<?=$array['categories']?>" class="tegs" style="background: gray;color: black;font-weight: 900;padding: 3px 10px;"> #<?=$array['categories']?></a>
            <div style="background: gray;color: black;font-weight: 900;padding: 3px 3px 3px 0;">/</div><div style="background:gray;color:white;font-weight: 100;padding: 3px 10px 0 0;" class="time_news"><?=$array['time']?></div>
        
        </div>

        <img style="width: 100%;" src="/project/img/<?=$array['img']?>" alt="">

        <div class="text_news"><?=$array['text']?></div>
    </div>
    <div class="container_news_recomend">
            <?foreach($arrayRec as $arr):?>
                <div class="col_n_c">
                <div class="time_rec"><?$date_sql = strtotime( $arr['time']);
                    echo $date_sql_normal = date( 'H:i', $date_sql );?></div>
               <a style="color: black;" href="/page/<?=$arr['id']?>"> <div class="title_rec"><?=$arr['title']?></div>
               </div> </a>
            <?endforeach?>
    </div>
</main>

<div class="content_comments">
    <div class="title_comments">Коментарии (<?=count($arrayCom)?>)</div>
        <?foreach($arrayCom as $arr):?>
        <div class="container_comm">

                <img src="/project/img/<?=$arr['img']?>" alt="" class="comm_cont">

            <div>
                
                <div class="name_comment">
                    <?if(trim($arr['name']) === 'Админ'):?>
                        <div style="color:red">ADMIN</div>
                    <?else:?>
                        <?=$arr['name']?>
                    <?endif?>
                </div>
                <div class="text_comm_cont"><?=$arr['text']?></div>
                <div class="time_comm"><?=$arr['time']?></div>

                <?if(trim($arr['name']) === $_SESSION['name'] or trim($_SESSION['name']) == 'Админ'):?>
                <a style="color: red;font-weight: 900;font-size: 12px;margin-top: 10px;" href="/deleteCom/<?=$arr['id']?>">Delete</a>
                <?endif?>

            </div>
        </div>
        <?endforeach?>

    <form style="margin-top: 65px;" action="/actionAddComment" class="from_comments" method="post">

    <h3 style=""><?=$_SESSION['name']?>, оставьте комментарий</h2>

    <div class="flex">
        <img src="/project/img/<?=$_SESSION['img']?>" alt="" class="comm_cont">
        <input type="text" name="text" placeholder="добавить коментарий" id="" class="text_comm" required>
    </div>
        
        <input type="hidden" name="name" class="text_comm" value="<?=$_SESSION['name']?>">
        <input type="hidden" name="img" value="<?=$_SESSION['img']?>" />
        <input type="hidden" name="page_id" value="<?=$id?>" />
        <input type="submit" value="Отправить" class="sub_comm">
    </form>
</div>
