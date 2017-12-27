<?php/** * Created by PhpStorm. * User: liuwei * Date: 2017/12/26 * Time: 下午12:51 */namespace app\api\controller\v1;use app\api\model\BaseModel;use app\api\service\WxNotify;use app\api\validate\IDMustBePositiveInt;use \app\api\service\Pay as PayService;class Pay extends BaseModel{    protected $beforeActionList = [        'checkExclusiveScope' => ['only' => 'getPreOrder']    ];        public function getPreOrder ($id='')    {        (new IDMustBePositiveInt()) -> goCheck();        $pay = new PayService($id);        return $pay -> pay();            }    public function receiveNotify ()    {        // 1. 检查库存量，超卖        // 2. 更新订单状态 status        // 3. 减库存        // 如果成功处理，返回微信成功处理的结果，否则，需要返回没有成功处理        // 特点：post xml格式  url不可用?携带参数        $notify = new WxNotify();        $notify -> Handle();    }    public function redirectNotify ()    {//        $notify = new WxNotify();//        $notify -> Handle();        $xmlData = file_get_contents('php://input');        $result = curl_post_raw('http://lw.cn/api/v1/pay/re_notify?XDEBUG_SESSION_START=12312', $xmlData);        return $result;    }}