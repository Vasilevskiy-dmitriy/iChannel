<?php
use lib\db;

$db = new db;
$array = $db->query('categories');
?>

<?php if(!empty($_SESSION['name'])):?>
    <?php $arrayFromURI = explode('/', $_SERVER['REQUEST_URI'])?>
    <?php if($arrayFromURI[1] === 'admin'):?>
        <?php if(trim($_SESSION['name']) === 'Админ'):?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="/project/webroot/admin_styles.css">
        </head>
        <body>
            
            <header class="admin_header">
                    <h1 class="admin_h1">Admin panel</h1>
                    <a href="/" class="logout">Назад</a>
                </header>
            <div class="admin_container">
                <div class="admin_menu">
                    <div class="a_cols">
                        <a href="/admin"><div class="a_col">My WebSite</div></a>
                        <a href="/admin/catalog"><div class="a_col">Catalog</div></a>
                        <a href="/admin/news"><div class="a_col">News</div></a>
                        <a href="/admin/users"><div class="a_col">Users</div></a>
                        <a href="/admin/comments"><div class="a_col">Comments</div></a>
                    </div>
                    <footer class="admin_footer"><div class="text_footer">E-Starter© 2021 v1</div></footer>
                </div>
                <div class="admin_content">
                    <?=$content?>
                </div>
            </div>

        <script>
            var checkboxes = document.querySelectorAll('input.thing'),
            checkall = document.getElementById('checkall');

        for(var i=0; i<checkboxes.length; i++) {
            checkboxes[i].onclick = function() {
                var checkedCount = document.querySelectorAll('input.thing:checked').length;
                
                checkall.checked = checkedCount > 0;
                checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
            }
        }

        checkall.onclick = function() {
            for(var i=0; i<checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        }
        </script>
        </body>
        </html>

        <?php else: header('Location:/')?>
        <?php endif?>
    <?php else:?>
<!DOCTYPE html>
<html>
	<head>
		
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" href="/project/webroot/wq.css">
	</head>
	<body>
<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
  <header>
        <div class="time_header">Kyiv <?php echo date("H:i");?> </div>
        <div>
            <a class="text_header" style="color: white;" href="/">Information channel</a> 
        </div>
           <div class="log_out_header">
              <img src="/project/img/<?php echo $_SESSION['img']?>" alt="" onclick="myFunction()" class="dropbtn">
            <div id="myDropdown" class="dropdown-content">
            <?php if(trim($_SESSION['name']) === 'Админ'):?>
                <a href="/admin">Управление сайтом</a>
                <?php endif?>
                <a href="/privateoffice">Личный кабинет</a>
                <a href="/logout">Выйти</a>
            </div>

            </div>
           </div>
           
    </header>

    <div class="catalog">
        <?php foreach($array as $arrs):?>
     <?php
        $arrayFromURI = explode('/', $_SERVER['REQUEST_URI']);
        
        if(!empty($arrayFromURI[2]))
        {
            if($arrs['tegs'] == $arrayFromURI[2]){
                $styleborder = 'border-bottom: 1px solid;';
            }else{
                $styleborder = 'border-bottom: none;';
            }
        }else{
            $styleborder = 'border-bottom: none;';
        } 
        
        
        ?>
            <a style="<?php echo $styleborder?>" href="/category/<?php echo $arrs['tegs']?>" class="catalog_link"><?php echo $arrs['name']?></a>
        <?php endforeach?>
    </div>

   <?php echo $content?>
    
  <footer>
        <div class="footer_container">
            <div class="form">
            Подписаться на Новости
            <div class="email_sub">
                <form action="" method="post" class="form_footer">
                    <input type="text" name="email" placeholder="Укажите e-mail" required>
                    <input type="submit" value="Отправить">
                </form>
            </div>
        </div>
        <div class="link_footer">
            <a class="link_footer_style" href="/about">About us</a>
            <a class="link_footer_style" href="/contact">Contact</a>
            <a class="link_footer_style" href="/author">Author</a>
        </div>
        <div class="text_footer">
            Information channel <p>2021
        </div>
        </div>
        
    </footer>

	</body>
</html>
<?php endif?>
<?php else:?>


<link rel="stylesheet" href="/project/webroot/wq.css">
<?php
if($_SERVER['REQUEST_URI'] == '/signin'){
    echo '<header style="justify-content:center;"><div><a class="text_header" style="color: white;" href="/">Information channel</a></div></header>';

    echo $content ;
    
    echo '<footer>
    <div class="footer_container">
    <div class="text_footer">
        Information channel <p>2021
    </div>
    </div>
</footer>';

}else if($_SERVER['REQUEST_URI'] == '/signup' || $_SERVER['REQUEST_URI'] == '/actionSignup'){
    echo '<header style="justify-content:center;"><div><a class="text_header" style="color: white;" href="/">Information channel</a></div></header>';
    
    echo $content ;

    echo '<footer>
    <div class="footer_container">
    <div class="text_footer">
        Information channel <p>2021
    </div>
    </div>
</footer>';
}
else{
    header('Location:/signin');
}
?>

<?php endif?>
