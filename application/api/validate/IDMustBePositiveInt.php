<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/12
 * Time: 下午9:51
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    protected $message = [
        'id' => 'id参数必须是正整数'
    ];

}