<?php
namespace Project\Models;
use Core\Model;
use lib\db;

class Page extends Model 
{
    public function getDate($id)
    {
        $db = new db;
        $id = $id['id'];
        
        $date = $db->querygetNewsId('news', $id);
        $arrayRec = $db->queryTableLimit('news', 10);
        $arrayCom = $db->queryCom($id);

        $array = [
            'array'=> $date,
            'arrayRec' => $arrayRec,
            'arrayCom'=>$arrayCom,
            'id' => $id
        ];

        return $array;
    }
}