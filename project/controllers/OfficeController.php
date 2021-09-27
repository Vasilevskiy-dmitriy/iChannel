<?php
namespace Project\Controllers;
use core\Controller;
use Project\Models\Office;
use lib\db;
use lib\session;

class officeController extends Controller
{
    public function office()
    {
        $data = new Office;
        $array = $data->getdate();
        return $this->render('office/office', $array);
    }
    public function actionEditName()
    {
        $name = trim($_POST['name']);
        $res = ( new db )->queryUsersName($name);
        $id = $_SESSION['id'];

        if(!empty($res))
        {
            if($_SESSION['name'] == $name){
                setcookie('YourName', 'block');
                header("Location:/privateoffice");
            }else{
                setcookie('NameE_OExist', 'block');
                header("Location:/privateoffice");
            }
        }else{
            $old_name = $_SESSION['name'];
            ( new db )->queryEditNameUsersInComm($old_name, $name);
            ( new db )->queryEditNameUsers($id, $name);
            ( new session )->setSession('name', $name);
            setcookie('editNameA', 'block');
            header("Location:/privateoffice");
        }
    }
    public function actionEditPassword()
    {
        $password = $_POST['password'];
        $name = $_SESSION['name'];

        $res = ( new db )->queryUsersName($name);

        if($res['password'] === $password)
        {
            $new_password = trim($_POST['new_password']);

            $id = $_SESSION['id'];

            if($res['password'] === $new_password)
            {
                setcookie('YourPassw', 'block');
                header("Location:/privateoffice");
            }else{
                ( new db )->queryUsersPasswordEdit($new_password, $id);
                setcookie('editPasswA', 'block');
                header("Location:/privateoffice");
            }
            

        }else{
            setcookie('YourPasswordFalse_O', 'block');
            header("Location:/privateoffice");
        }

        // if(!empty( $res ))
        // {
        //     echo $_POST['new_password'];
        // }else {
        //     setcookie('YourPasswordFalse_O', 'block');
        //     header("Location:/privateoffice");
        // }
    }
}