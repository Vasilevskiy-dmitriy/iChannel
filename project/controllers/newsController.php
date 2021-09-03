<?php
namespace Project\Controllers;
use \Core\Controller;
use Project\Models\News;

class newsController extends Controller
{
    public function getNews ()
    {
        $data = ( new News )-> getData();
        return $this->render('news/news', $data);
    }
}