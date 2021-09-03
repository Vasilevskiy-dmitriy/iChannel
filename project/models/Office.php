<?php
namespace Project\Models;
use Core\Model;
use lib\db;

class Office extends Model 
{
    public function getDate()
    {
        $db = new db;
        $name = $_SESSION['name'];
        $arrayCom = $db->queryComName($name);

        $array = [
            'arrayCom'=>$arrayCom,
        ];

        return $array;
    }
}