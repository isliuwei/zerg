<?php/** * Created by PhpStorm. * User: liuwei * Date: 2017/12/19 * Time: 上午12:05 */namespace app\api\validate;class TokenGet extends BaseValidate{    protected $rule = [        'code' => 'require|isNotEmpty'    ];    protected $message = [        'code' => '没有Code，无权限~~~~'    ];}