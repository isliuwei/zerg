<?php

namespace app\api\model;


use app\lib\exception\ProductException;
use think\Model;

class Product extends BaseModel
{
    //
    protected $hidden = ['delete_time', 'create_time', 'from', 'category_id', 'update_time', 'pivot'];

    // 利用--数据冗余--不用嵌套查询
//    public function img()
//    {
//        return $this -> belongsTo('image', 'img_id', 'id');
//    }

    public function getMainImgUrlAttr($value, $data)
    {
        return $this -> prefixImgUrl($value, $data);
    }

    public static function getMostRecent($count)
    {
        $products = self::limit($count)
            -> order('create_time desc')
            -> select();
        return $products;
    }

    public static function getProductsByCategoryID($categoryID)
    {
       $products = self::where('category_id', '=', $categoryID)
           ->select();
       return $products;
    }

}
