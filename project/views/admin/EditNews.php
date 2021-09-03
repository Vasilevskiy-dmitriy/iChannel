
<div class="form_add_admin_container">

    <form class="form_add" action="actionEditNews/<?=$arrayGetNews['id']?>" method="post" enctype="multipart/form-data">

        <div class="cont_text_add_form" >Заголовок:</div>
        <input class="in_add_adm" type="text" name="title" value="<?=$arrayGetNews['title']?>" id="" required>

        <img src="/project/img/<?=$arrayGetNews['img']?>" alt="" srcset="">

        <div class="cont_text_add_form">Текст:</div>
        <textarea name="text"  class="in_add_adm"  id="" required><?=$arrayGetNews['text']?></textarea>

        <input type="file" class="f_k" name="image" id="">

        <div class="cont_text_add_form">Категория:</div>
        <select name="categories" id="">
            <?foreach($arrayCategoriesAdd as $arrC):?>

                <?if($arrC['tegs'] === 'last_news')continue;?>

            <option <?if($arrC['tegs'] == $arrayGetNews['categories']) echo 'selected';?> value="<?=$arrC['tegs']?>"><?=$arrC['name']?></option>
            
            <?endforeach?>
        </select>

        <input class="ins_add_adm" type="submit" value="Добавить">
    </form>

</div>
