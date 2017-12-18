<?php

namespace app\api\model;

use app\lib\exception\CategoryException;
use think\Model;

class Category extends BaseModel
{
    //
    protected $hidden = ['delete_time', 'update_time'];
    public static function getCategories()
    {
        $categories = self::all([], 'topicImg') -> hidden(['description']);
                    //self::with('topicImg') -> select();
        if ($categories -> isEmpty())
        {
           throw new CategoryException();
        }
        return $categories;

    }

    public function topicImg()
    {
        return $this -> belongsTo('image', 'topic_img_id', 'id');
    }

    
}
