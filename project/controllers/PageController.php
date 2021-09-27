<?php
namespace Project\Controllers;
use core\Controller;
use Project\Models\Page;

class pageController extends Controller
{
    public function page ($id)
    {
        $data = new Page;
        $array = $data->getdate($id);
        return $this->render('page/page', $array);
    }
}