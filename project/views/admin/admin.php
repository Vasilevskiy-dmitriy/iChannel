<div class="a_con">
<div class="cont_dash">

    <div class="t_Cd_A">Dashboard</div>

    <div class="cont_Cd_A_ATC">

        <div class="activ_cont">
            <div class="t_activ">Activity</div>
            <div class="statistic"></div>
        </div>

        <div class="top_comm_cont">
            <div class="t_activ">Users and their number comments:</div>
            <div class="c_tc_AA">

                
                <?foreach($arrayUsers as $arr):?>

                <?php 
                $name = $arr['name'];
                $colName = count($arrayCom->getQualCom($name));
                ?>

                

                <div class="row_cont_TC">
                    <img class = "dash_img" src="/project/img/<?=$arr['img']?>" alt="" srcset="">
                    <div class="name_TC"><?=$arr['name']?></div>
                    <div class="count_c"><?=$colName?></div>
                </div>

                <?endforeach?>
                

            </div>
        </div>

    </div>

    <div class="cont_TN_AA">
        <div class="t_activ">News:</div>

        <div class="flex">
<?foreach($arrayNews as $arrayNew):?>
            <div class="row_TC_AAA">
                <div class="ti_TC_AAA"><?=mb_substr($arrayNew['title'], 0, 25).'...'?></div>
                <div class="cat_TC_AAA"><?=$arrayNew['categories']?></div>
                <img src="project/img/<?=$arrayNew['img']?>" alt="">
                <div class="date_TC_AAA"><?=$arrayNew['time']?></div>
            </div>
<?endforeach?>
        </div>

    </div>

</div>

</div>