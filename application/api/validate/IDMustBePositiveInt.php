<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/12
 * Time: 下午9:51
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePositiveInt extends Validate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    // 判断ID是否为正整数
    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0)
        {
            return true;
        }
        else
        {
            return $field . '必须是正整数.';
        }
    }

}