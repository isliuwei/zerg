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
use think\Model;


class Banner extends Model
{
//    protected $table = 'category';
//    public static function getBannerByID($id)
//    {
        // $result = Db::query('select * from banner_item where banner_id=?', [$id]);
//        $result = Db::table('banner_item')
//            -> where('banner_id', '=', $id)
//            -> select();

        // 闭包方法
//        $result = Db::table('banner_item')
//            -> fet chSql()
//            -> where(function($query) use($id) {
//                $query -> where('banner_id', '=', $id);
//            })
//            -> select();
//        return $result;
//    }
    // 隐藏字段
    protected $hidden = ['delete_time', 'update_time'];

    public static function getBannerByID($id)
    {
        // get, find, all, select
        $banner = self::with(['items', 'items.img'])
            -> find($id);
        return $banner;
    }

    public function items()
    {
        return $this -> hasMany('BannerItem', 'banner_id', 'id');
    }



}