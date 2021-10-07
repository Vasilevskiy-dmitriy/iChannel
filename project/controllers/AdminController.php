<?php
namespace Project\Controllers;

use core\Controller;
use lib\db;
use Project\Models\Admin;

class adminController extends Controller
{

// Admin
    public function admin ()
    {
        $data = ( new Admin )->getDateForAllInfo();

        return $this->render('admin/admin', $data);
    }


// Catalog
public function admin_catalog ()
{
    $data = ( new Admin )->getData();
    return $this->render('admin/catalog', $data);
}   

// NEWS
    public function action_delete_news_checkbox()
    {
        $array =  $_POST;

        foreach($array as $key=>$vel){
            $res = ($key = [$vel]);
            ( new db )->deleteNews($res[0]);
        }
        header('Location:/admin/news');
    }

    public function news ()
    {
        $data = ( new Admin )->getData();
        return $this->render('admin/news', $data);
    }

    public function AddNews()
    {
        $data = ( new Admin )->getData();
        return $this->render('admin/addNews', $data);
    }

    public function actionAddNews()
    {
        
        $title = $_POST['title'];
        $text = $_POST['text'];
        $categories = $_POST['categories'];
        $image = $_FILES['image'];
        

        function uploadImage($image)
        {
            $extension = pathinfo($image['name'],PATHINFO_EXTENSION);
            $fileName = uniqid()."."."$extension";

            move_uploaded_file($image['tmp_name'], "project/img/" . $fileName);

            return $fileName;
        }

        $fileName = uploadImage($image);

        ( new db )->addNews($title, $text, $categories, $fileName);

        header('Location:/admin/news');
        
    }

    public function EditNews($id)
    {
        $data = ( new Admin )->getDataId($id);
        return $this->render('admin/EditNews', $data);
    }

    public function actionEditNews($id)
    {
        $id = $id['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $categories = $_POST['categories'];
        $image = $_FILES['image'];

        function uploadImageE($image)
        {
            $extension = pathinfo($image['name'],PATHINFO_EXTENSION);
            $fileName = uniqid()."."."$extension";

            move_uploaded_file($image['tmp_name'], "project/img/" . $fileName);

            return $fileName;
        }

        $fileName = uploadImageE($image);

        ( new db )->EditNews($title, $text, $categories, $fileName, $id);

        header('Location:/admin/news');
    }

// Users
    public function admin_comments ()
    {
        $data = ( new Admin )->getData();
        return $this->render('admin/comments', $data);
    }

}
