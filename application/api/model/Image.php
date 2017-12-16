<?php

namespace app\api\model;

use think\Model;

class Image extends Model
{
    //
    protected $hidden = ['id', 'img_id', 'from', 'delete_time', 'update_time'];
}
