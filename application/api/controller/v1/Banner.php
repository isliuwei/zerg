<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/12
 * Time: 上午11:00
 */

namespace app\api\controller\v1;

use app\lib\exception\BannerMissException;
use think\Exception;
use think\Validate;
use app\api\validate\IDMustBePositiveInt;
use app\api\model\Banner as BannerModel;


class Banner
{
    /**
     *
     * 获取指定id的banner信息
     * @url     /banner/:id
     * @http    GET
     * @id      banner的id号
     *
     */
    public function getBanner($id)
    {
        (new IDMustBePositiveInt()) -> goCheck();

        $banner = BannerModel::getBannerByID($id);
        // 隐藏对象属性值
        // $banner -> hidden(['delete_time', 'update_time']);
        // 只显示对象指定的属性值
        // $banner -> visible(['id', 'name']);
        if (!$banner)
        {
            throw new BannerMissException();
        }
        return $banner;
    }
}