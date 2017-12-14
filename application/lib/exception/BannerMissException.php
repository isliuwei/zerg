<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/14
 * Time: 下午12:38
 */

namespace app\lib\exception;


use app\api\validate\BaseValidate;

class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的Banner不存在';
    public $errorCode = 40000;

}