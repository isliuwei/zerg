<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/14
 * Time: 下午12:34
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    // HTTP 状态码 404,200
    public $code = 400;

    // 错误具体信息
    public $msg = "invalid parameters";

    // 自定义的错误码
    public $errorCode = 999;

    public function __construct($params = [])
    {
        if (!is_array($params))
        {
            // throw new Exception('参数必须是数组');
            return;
        }

        if (array_key_exists('code', $params))
        {
            $this -> code = $params['code'];
        }

        if (array_key_exists('msg', $params))
        {
            $this -> msg = $params['msg'];
        }

        if (array_key_exists('errorCode', $params))
        {
            $this -> errorCode = $params['errorCode'];
        }


    }

}