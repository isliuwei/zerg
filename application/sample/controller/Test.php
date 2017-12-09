<?php
/**
 * Created by PhpStorm.
 * User: liuwei
 * Date: 2017/12/9
 * Time: 下午2:35
 */

namespace app\sample\controller;

use think\Request;

class Test
{
    public function hello()
    {
        $id = Request::instance() -> param('id');
        $name = Request::instance() -> param('name');
        $age = Request::instance() -> param('age');
        $all = Request::instance() -> param();
        $getParam = Request::instance() -> get();
        $postParam = Request::instance() -> post();
        $routeParam = Request::instance() -> route();

        // 助手函数
        // input
        $input_all = input('param.');
        $input_get_name = input('get.name');
        $input_post_sex = input('post.sex');
        print_r($all);
        echo $all['age'] .'--'. $id .'--'. $name .'--'. $age;
        var_dump($getParam);
        var_dump($routeParam);
        var_dump($postParam);
        var_dump($input_all);
        echo $input_get_name .' ++++ '. $input_post_sex;



    }
//    public function hello(Request $req) //依赖注入
//    {
//        $param = $req -> param();
//    }

}