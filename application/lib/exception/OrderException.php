<?php/** * Created by PhpStorm. * User: liuwei * Date: 2017/12/25 * Time: 下午5:55 */namespace app\lib\exception;class OrderException extends BaseException{    public $code = 404;    public $msg = '订单不存在，请检查ID';    public $errorCode = 80000;}