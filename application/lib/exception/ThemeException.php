<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/18
 * Time: 上午1:04
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定的主题不存在，请检查主题ID';
    public $errorCode = 30000;
}