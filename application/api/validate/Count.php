<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/18
 * Time: 下午2:59
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];
}