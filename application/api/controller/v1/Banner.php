<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/12
 * Time: 上午11:00
 */

namespace app\api\controller\v1;

use think\Validate;
use app\api\validate\TestValidate;

class Banner
{
    /**
     *
     * 获取指定id的banner信息
     * @url     /banner/:id
     * @http    GET
     * @id      banner的id号
     *
     */
    public function getBanner($id)
    {
        //独立验证
        $data = [
            'name' => 'liuwei',
            'email' => 'lw.588@163.com'
        ];
        // $validate = new Validate([
        //     'name' => 'require|max:10',
        //     'email' => 'email'
        // ]);

        $validate = new TestValidate();

        $result = $validate -> batch() -> check($data);
        $error = $validate -> getError();

    }

}