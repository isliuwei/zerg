<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/13
 * Time: 上午1:52
 */

namespace app\api\model;

use think\Db;
use think\Exception;


class Banner
{
    public static function getBannerByID($id)
    {
        // $result = Db::query('select * from banner_item where banner_id=?', [$id]);
        $result = Db::table('banner_item')
            -> where('banner_id', '=', $id)
            -> select();

        // 闭包方法
//        $result = Db::table('banner_item')
//            -> fetchSql()
//            -> where(function($query) use($id) {
//                $query -> where('banner_id', '=', $id);
//            })
//            -> select();
        return $result;
    }
}