<?php

namespace app\api\model;

use think\Model;

class ProductImage extends BaseModel
{
    //
    protected $hidden = ['img_id', 'delete_time', 'product_id'];

    // productImg image 一对一关系
    public function imgUrl()
    {
        return $this -> belongsTo('image', 'img_id', 'id');
    }
}
