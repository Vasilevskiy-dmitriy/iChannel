<?php
use lib\db;
use lib\session;

$session = new session;
$name = $session->getSession('name');

$array = ( new db ) ->queryTableLimit('news',3);
?>

<title>Information channel</title>

<div class="container_strat">
    <div class="left_content">
        <div class="text_information">
            <h1 class="h1_inform">
                INFRORMATION <p style="margin: 0;">CHANNEL
            </h1>
            <div class="text_info">
                <p style=" font-size:16px; margin-bottom: 10px;">Добро пожаловать, <?=$_SESSION['name']?> </p>
                <p>Информационный канал создан специально по инициативе лучших умов мира. Он явлет собой невероятный и абсолютный источник информации в СНГ, а вдальнейшем, и во всем мире !</p>
            </div>
        </div>
    </div>

    <div class="right_content">

        <div class="content_news_main">

            <div class="title_main">
                Last news
            </div>

                <div class="container">
                    <?foreach($array as $arr):?>
                        <div class="col">

                            <div class="time"><?$date_sql = strtotime( $arr['time']); echo date( 'H:i', $date_sql );?></div>

                            <div class="text_container">
                                <a style="color: black;" href="/page/<?=$arr['id']?>"> 
                                    <div class="title_container">  <?=$arr['title']?>  </div>
                                </a>
                                <div class="tags">
                                <a href="/category/<?=$arr['categories']?>" class="tegs"> 
                                    #<?=$arr['categories']?>
                                </a>
                                <div class="tegs" style="float: right;"> 
                                    <?$date_sql = strtotime( $arr['time']); echo date( 'd-m-Y', $date_sql )?>
                                </div>
                                </div>
                            </div>

                            <img src="/project/img/<?=$arr['img']?>" alt="" style="height: 100px; width:100px">

                        </div>
                    <?endforeach?>
                </div>
        </div>

     </div>
</div>