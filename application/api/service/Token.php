<?php/** * Created by PhpStorm. * User: liuwei * Date: 2017/12/19 * Time: 下午3:44 */namespace app\api\service;use app\lib\exception\TokenException;use think\Cache;use think\Exception;use think\Request;use app\lib\enum\ScopeEnum;use app\lib\exception\ForbiddenException;class Token{    public static function generateToken ()    {        // 32个字符组成一组随机字符串        $randChar = getRandChar(32);        // 用三组字符串，进行md5加密        // 32位随机字符串 + 时间戳 + salt        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];        $tokenSalt = config('secure.token_salt');        return md5($randChar . $timestamp . $tokenSalt);    }    public static function getCurrentTokenVar ($key)    {        $token =  Request::instance()            -> header('token');        $vars = Cache::get($token);        if (!$vars)        {            throw new TokenException();        }        else        {            if (!is_array($vars))            {                $vars = json_decode($vars, true);            }            if (array_key_exists($key, $vars))            {                return $vars[$key];            }            else            {                throw new Exception('尝试获取的Token的变量并不存在');            }        }    }    public static function getCurrentUid ()    {        // token        $uid = self::getCurrentTokenVar('uid');        return $uid;    }    // 用户和CMS管理员都可以访问的权限    public static function needPrimaryScope ()    {        $scope = self::getCurrentTokenVar('scope');        if ($scope)        {            if ($scope >= ScopeEnum::User)            {                return true;            }            else            {                throw new ForbiddenException();            }        }        else        {            throw new TokenException();        }    }    // 只有用户才能访问的接口权限    public static function needExclusiveScope ()    {        $scope = self::getCurrentTokenVar('scope');        if ($scope)        {            if ($scope == ScopeEnum::User)            {                return true;            }            else            {                throw new ForbiddenException();            }        }        else        {            throw new TokenException();        }    }    public static function isValidOperate ($checkedUID)    {        if (!$checkedUID)        {            throw new Exception('检查UID时，必须传入一个被检查的UID');        }        $currentOperateUID = self::getCurrentUid();        if ($checkedUID == $currentOperateUID)        {            return true;        }        return false;            }}