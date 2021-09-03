<?php
namespace Project\Models;
use \Core\Model;
use lib\db;

class News extends Model
{
    public function getData()
    {
        $db = new db;

        $arrayFromURI = explode('/', $_SERVER['REQUEST_URI']);
        $name_category = $db->queryWhere("$arrayFromURI[2]");
          
        if(is_array($name_category))
        {
            if($arrayFromURI[2] == 'last_news')
            {
                $array = $db->queryRevers('news');
            }else{
                $array = $db->queryReversCategories('news',$arrayFromURI[2] );
            }
        }else{
            header('Location:/error'); 
        }

        $arrays = [
            'name' => $name_category,
            'news' => $array
        ];
        
        return $arrays;
    }
}