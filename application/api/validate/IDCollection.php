<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/17
 * Time: 下午11:26
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids参数必须是以逗号分隔的多个正整数，例如：1,2,7'
    ];

    // ids = id1,id2,...
    protected function checkIDs($value)
    {
        $values = explode(',', $value);
        if (empty($values))
        {
            return false;
        }
        foreach ($values as $id)
        {
            if (!$this -> isPositiveInteger($id))
            {
                return false;
            }
        }

        return true;
    }
}