<?php
namespace lib;

use mysqli;

class db {

    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli('localhost', 'root','', 'ichannel');
    }

    public function query($table){
        $query = "SELECT * FROM `$table`";
        $result = mysqli_query($this->mysqli, $query);
        
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 
    public function queryRevers($table){
        $query = "SELECT * FROM `$table`  ORDER BY `$table`.`id` DESC";
        $result = mysqli_query($this->mysqli, $query);
        
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 
    public function queryReversCategories($table, $categories){
        $query = "SELECT * FROM `$table` WHERE `categories` = '$categories' ORDER BY `$table`.`id` DESC";
        $result = mysqli_query($this->mysqli, $query);
        
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 
    public function queryWhere($tags)
    {
        $query = "SELECT * FROM `categories` WHERE `tegs` = '$tags'";
        $result = mysqli_query($this->mysqli, $query);

        return mysqli_fetch_assoc($result);
    }
    public function queryLogOut($email, $pass){
        $mysqli = $this->mysqli;
        return $mysqli->query("SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$pass'");
    }
    public function queryEmail($email){
        $mysqli = $this->mysqli;
        $res = $mysqli->query("SELECT * FROM `users` WHERE `email` LIKE '$email'");
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
    public function queryName($name){
        $mysqli = $this->mysqli;
        $res = $mysqli->query("SELECT * FROM `users` WHERE `name` LIKE '$name'");
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
    public function querygetNewsId($table, $id){
        $query = "SELECT * FROM `$table` WHERE id = $id";
        $result = mysqli_query($this->mysqli, $query);
        
        return mysqli_fetch_assoc($result);
    }
    public function queryTableLimit($table, $limit){
        $query = "SELECT * FROM `$table` ORDER BY `$table`.`time` DESC LIMIT $limit";
        $result = mysqli_query($this->mysqli, $query);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function queryCom($page_id)
    {
        $query = "SELECT * FROM `comments` WHERE `page_id`='$page_id'"; 

        $result = mysqli_query($this->mysqli, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function queryComName($name)
    {
        $query = "SELECT * FROM `comments` WHERE `name`='$name'"; 

        $result = mysqli_query($this->mysqli, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function querySignUp($email, $name, $password, $img)
    {
        $query = "INSERT INTO `users` (`email`, `name`, `password`, `img`) VALUES ('$email', '$name', '$password', '$img')";
        mysqli_query($this->mysqli, $query);
    }
    public function queryUsersName($name)
    {
        $query = "SELECT * FROM `users` WHERE `name`='$name'"; 

        $result = mysqli_query($this->mysqli, $query);
        return mysqli_fetch_assoc($result);
    }
    public function getQualCom($name)
    {
        $query = "SELECT * FROM `comments` WHERE `name` = '$name'";

        $result = mysqli_query($this->mysqli, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }




    public function queryUsersPasswordEdit($password, $id)
    {
        $query = "UPDATE `users` SET `password` = '$password' WHERE `users`.`id` = $id";
        mysqli_query($this->mysqli, $query);
    }
    public function queryEditNameUsers($id, $name)
    {
        $query = "UPDATE `users` SET `name` = '$name ' WHERE `users`.`id` = $id";
        mysqli_query($this->mysqli, $query);
    }
    public function queryEditNameUsersInComm($old_name, $name)
    {
        $query = "UPDATE `comments` SET `name` = '$name ' WHERE `name` = '$old_name'";
        mysqli_query($this->mysqli, $query);
    }
    public function fetch($query)
    {
        $result = $query;
        return mysqli_fetch_assoc($result);
    }
    public function EditNews($title, $text, $categories, $img, $id)
    {
        $query = "UPDATE `news` SET `title`='$title', `text` = '$text', `categories` = '$categories', `img` = '$img' WHERE `news`.`id`=$id";
       
        mysqli_query($this->mysqli, $query);
    }


    public function addNews($title, $text, $categories, $img)
    {
        $query = "INSERT INTO `news` (`title`, `text`, `categories`, `img`) VALUES ('$title', '$text', '$categories', '$img')";
        mysqli_query($this->mysqli, $query);
    }

    public function addComment($name, $page_id, $text_comment, $img)
    {
        $query = "INSERT INTO `comments` (`name`, `page_id`, `text`, `img`) VALUES ('$name', '$page_id', '$text_comment', '$img')";
        mysqli_query($this->mysqli, $query);
    }



    public function deleteCom ($id)
    {
        $query = "DELETE FROM `comments` WHERE `comments`.`id` = $id";
        mysqli_query($this->mysqli, $query);
    }
    public function deleteNews($id)
    {
        $query = "DELETE FROM `news` WHERE `news`.`id` = $id";
        mysqli_query($this->mysqli, $query);
    }
}