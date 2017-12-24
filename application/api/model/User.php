<?php

namespace app\api\model;

use think\Model;

class User extends BaseModel
{
    //
    // 定义 用户与用户地址 一对一关系
    public function address()
    {
        return $this -> hasOne('UserAddress', 'user_id', 'id');
    }

    public static function getByOpenID($openid)
    {
        $user = self::where('openid', '=', $openid)
            -> find();
        return $user;
    }
}
