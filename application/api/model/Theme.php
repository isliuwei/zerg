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
}
