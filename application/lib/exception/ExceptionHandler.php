<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/13
 * Time: 上午11:15
 */

namespace app\lib\exception;


use think\Exception;
use think\exception\Handle;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    // 需要返回客户端当前请求的URL路径

    public function render(Exception $e)
    {
        if ($e instanceof BaseException)
        {
            // 如果是自定义的异常
            $this -> code = $e -> code;
            $this -> msg = $e -> msg;
            $this -> errorCode = $e -> errorCode;
        }
        else
        {
            // 记录日志log
            $this -> code = 500;
            $this -> msg = '服务器内部错误.';
            $this -> errorCode = 999;
        }
        $request = Request::instance();
        $result = [
            'error_code' => $this -> errorCode,
            'msg' => $this -> msg,
            'request_url' => $request -> url()
        ];
        return json($result, $this -> code);
    }
}