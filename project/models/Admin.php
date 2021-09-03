<?php
namespace Project\Models;

use Core\Model;
use lib\db;

class Admin extends Model
{
    public function getDateForAllInfo()
    {
        $arrayCom = ( new db );
        $arrayUsers = ( new db )->query('users');
        $arrayNews = ( new db )->queryRevers('news');

        return [
            'arrayCom' => $arrayCom,
            'arrayUsers' => $arrayUsers,
            'arrayNews' => $arrayNews
        ];
    }

    public function getData ()
    {
        $arrayNews = ( new db )->queryRevers('news');
        $arrayCatAdd = ( new db )->query('categories');

        return [ 
            "arrayNews" => $arrayNews,
            "arrayCategoriesAdd" => $arrayCatAdd,
            // "arrayUsers" => $arrayUsers,
            // "arrayComments" => $arrayCom
        ];
    }
    public function getDataId ($id)
    {
        $id = $id['id'];
        $arrayGetNews = ( new db )->querygetNewsId('news', $id);
        $arrayCatAdd = ( new db )->query('categories');

        return [ 
            "arrayCategoriesAdd" => $arrayCatAdd,
            "arrayGetNews" => $arrayGetNews,
        ];
    }
}