<div class="a_con">
    <div class="prdocts">
        <div class="header_prod">
            <h3 class="tepr">users</h3>
            <a href="news/add" class="add_prod">+</a>
        </div>
        <div class="pl">Users List</div>
        
            <table class="table_dark">
                <tr>
                <th></th>
                <th>email</th>
                <th>name</th>
                <th>password</th>
                <th>Action</th>
                <th><input type="checkbox" name="check" id="checkall"></th>
                </tr>
                <form action="/admin/action_delete_news_checkbox" method="post">
                <?foreach($arrayUsers as $arr):?>
                <tr>
                    <td><img style="height:100px;" src="/project/img/<?=$arr['img']?>" alt=""></td>
                    <td><?=$arr['email']?></td>
                    <td><?=$arr['name']?></td>
                    <td><?=$arr['password']?></td>
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
                    <td></td>
                    <td></td>
                    <td><input class="delete" type="submit" value="DELETE"></td>
                </tr>
            </table></form>
    </div>
</div>