<?php
namespace Project\Controllers;
use core\Controller;


class MainController extends Controller
{
    public function main()
    {
        return $this->render('main/main');
    }
}