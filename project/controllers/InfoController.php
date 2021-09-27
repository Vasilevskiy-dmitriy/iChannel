<?php
namespace Project\Controllers;
use core\Controller;

class infoController extends Controller
{
    public function contact ()
    {
        return $this->render('info/contact');
    }
    public function about ()
    {
        return $this->render('info/about');
    }
    public function author ()
    {
        return $this->render('info/author');
    }
}