<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/14
 * Time: 下午5:27
 */

namespace app\lib\exception;


use think\Exception;

class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = 'Parameter error';
    public $errorCode = '10000';
}