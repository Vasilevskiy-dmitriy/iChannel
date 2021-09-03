<div class="form_add_admin_container">

    <form class="form_add" action="actionAddNews" method="post" enctype="multipart/form-data">

        <div class="cont_text_add_form" >Заголовок:</div>
        <input class="in_add_adm" type="text" name="title" id="" required>

        <div class="cont_text_add_form">Текст:</div>
        <textarea name="text"  class="in_add_adm" id="" required></textarea>

        <input type="file" class="f_k" name="image" id="">

        <div class="cont_text_add_form">Категория:</div>
        <select name="categories" id="">
            <?foreach($arrayCategoriesAdd as $arr):?>
                <?if($arr['tegs'] === 'last_news')continue;?>
            <option value="<?=$arr['tegs']?>"><?=$arr['name']?></option>
            
            <?endforeach?>
        </select>
        
        <input class="ins_add_adm" type="submit" value="Добавить">
    </form>

</div>
