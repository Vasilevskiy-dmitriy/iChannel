<?php
namespace Project\Controllers;
use core\Controller;

class SignController extends Controller
{
    public function signin()
    {
        if(!empty($_SESSION['name']))
        {
            header('Location:/');
        }
        return $this->render('sign/signin');
    }

    public function signup()
    {
        return $this->render('sign/signup');
    }
}