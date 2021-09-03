<title><?=$name['name']?></title>
<main>
 <div class="news">

        <div class="title_main"><?=$name['name']?></div>
    
        <div class="container">

            <?foreach($news as $arr):?>
           <div class="col">
                <div class="time"><?
                    $date_sql = strtotime( $arr['time']);
                    echo $date_sql_normal = date( 'H:i', $date_sql );?></div>
                <div class="text_container">
                <a style="color: black;" href="/page/<?=$arr['id']?>"> <div class="title_container"><?=$arr['title']?></div></a>
                <a style="color: black;" href="/page/<?=$arr['id']?>">  <?=mb_substr($arr['text'],0, 75).'...'?></a>
                <div class="tags">
                    <a href="/category/<?=$arr['categories']?>" class="tegs"> #<?=$arr['categories']?></a>
                </div>
                </div>
                <img src="/project/img/<?=$arr['img']?>" alt="" style="height: 100px; width:100px">
            </div>
            <?endforeach?>

    </div>   
</main>
