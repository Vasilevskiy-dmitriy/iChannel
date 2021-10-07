<div class="a_con">
    <div class="prdocts">
        <div class="header_prod">
            <h3 class="tepr">Catalog</h3>
            <a href="news/add" class="add_prod">+</a>
        </div>
        <div class="pl">Catalog List</div>
        
            <table class="table_dark">
                <tr>
                <th>Name</th>
                <th>Teg</th>
                <th>Action</th>
                <th><input type="checkbox" name="check" id="checkall"></th>
                </tr>
                <form action="/admin/action_delete_news_checkbox" method="post">
                <?foreach($arrayCategoriesAdd as $arr):?>
                <tr>
                    <td><?=$arr['name']?></td>
                    <td><?=$arr['tegs']?></td>
                    <td>
                        <div class="action">
                            <a href="news/edit/<?=$arr['id']?>" class="edit">Edit</a>
                            <a href="/edit/<?=$arr['id']?>" class="delete">Delete</a>
                        </div>
                    </td>
                    <td><input type="checkbox"  class="thing" name="<?=$arr['id']?>" value="<?=$arr['id']?>"></td>
                </tr>
                <?endforeach?>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input class="delete" type="submit" value="DELETE"></td>
                </tr>
            </table></form>
    </div>
</div>