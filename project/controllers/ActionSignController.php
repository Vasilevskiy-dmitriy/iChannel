<?php
namespace Project\Controllers;
use core\Controller;
use lib\db;
use lib\session;

class ActionSignController extends Controller
{
    public function SignIn()
    {
        $db = new db;
        $session = new session;

        $email = $_POST['email'];
        $r = $db->queryEmail($email);

        if(!empty($r))
        {
            $password = $_POST['password'];
            $res = $db->queryLogOut($email, $password);
            
            if(mysqli_num_rows($res)>0)
            {
                header("Location:/");
                $array = $db->fetch($res);
                $session->setSession('name', $array['name']);
                $session->setSession('img', $array['img']);
                $session->setSession('id', $array['id']);
            }else{
                header("Location:/signin");
                setcookie('passwordFalse', 'block'); 
            }

        }else{
            header("Location:/signin");
            setcookie('loginNotExist', 'block');
        }
    }

    public function SignUp()
    {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];



        $image = $_FILES['image'];

        if (!empty($image['name']))
        {
            function uploadImage($image){
            $extension = pathinfo($image['name'],PATHINFO_EXTENSION);
            $fileName = uniqid()."."."$extension";

            move_uploaded_file($image['tmp_name'], "project/img/" . $fileName);

            return $fileName;
            }

            $fileName = uploadImage($image);
        }else{
            $fileName = 'user.png';
        }
        

        $email = htmlspecialchars($email);
        $name = htmlspecialchars($name);
        $password = htmlspecialchars($password);
        
        $rE = ( new db )->queryEmail($email);
        $rN = ( new db )->queryName($name);

        if(!empty($rE))
        {

            setcookie('EmailExist', 'block');
            header("Location:/signup");

        }else{
            
            if(empty($rN))
            {
                ( new db )->querySignUp($email, $name, $password, $fileName);

                $res = ( new db )->queryLogOut($email, $password);
                $array = ( new db )->fetch($res);

                (new session)->setSession('name', $array['name']);
                (new session)->setSession('img', $array['img']);
                (new session)->setSession('id', $array['id']);

                header("Location:/");
            }else{
                setcookie('NameExist', 'block');
                header("Location:/signup");
            }

        }
    }

    public function LogOut()
    {
        session::unsetSession();
        header('Location:/signin');
    }
}
