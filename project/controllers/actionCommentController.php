<?php
namespace Project\Controllers;
use core\Controller;
use lib\db;

class actionCommentController extends Controller
{
    public function AddComment()
    {
        $name = $_POST["name"];
        $page_id = $_POST["page_id"];
        $text_comment = $_POST["text"];
        $img = $_POST['img'];

        $name = htmlspecialchars($name);
        $text_comment = htmlspecialchars($text_comment);
        
        ( new db )->addComment($name, $page_id, $text_comment, $img);
       
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    public function deleteComment($id)
    {
        if(!empty($_SESSION['name'])){

            $id = $id['id'];
            ( new db )->deleteCom($id);
            
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }
    }
}