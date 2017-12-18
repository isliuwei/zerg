<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/18
 * Time: 下午2:56
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;

class Product
{
    public function getRecent($count = 15)
    {
        (new Count()) -> goCheck();
        $result = ProductModel::getMostRecent($count);
        if(!$result)
        {
            throw new ProductException();
        }
        return $result;
    }
}