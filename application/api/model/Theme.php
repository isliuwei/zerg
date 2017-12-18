<?php

namespace app\api\model;

use think\Model;

class Theme extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time', 'topic_img_id', 'head_img_id'];
    // 处理 Theme 与 topicImage 一对一关系 belongsTo 有外键的那张表 定义为belongsTo 否则为hasOne
    public function topicImg()
    {
        return $this -> belongsTo('image', 'topic_img_id', 'id');
    }

    // 处理 Theme 与 headImage 一对一关系 belongsTo
    public function headImg()
    {
        return $this -> belongsTo('image', 'head_img_id', 'id');
    }

    // 处理 Theme 与 Product 多对多 关系
    public function products()
    {
        return $this -> belongsToMany('Product', 'theme_product', 'product_id', 'theme_id');
    }

    public static function getThemeWithProducts($id)
    {
//        $theme = self::with('products.img,topicImg,headImg')
//            -> find($id);
        $theme = self::with('products,topicImg,headImg')
            -> find($id);
        return $theme;

    }
}
