<?php
/**
 * Created by PhpStorm.
 * User: bird
 * Date: 2014/12/22
 * Time: 22:21
 */
class TestController extends BaseController{

    public $title = "测试";

    public function init(){
        parent::init();
    }

    public function indexAction(){
        $userM = D("User");
        $user[] = array('login'=>'917680415@qq.com','pwd'=>'78951234','nick'=>'bird');
        $user[] = array('login'=>'917680415@qq.com','pwd'=>'78951234','nick'=>'bird');
        $user[] = array('login'=>'917680415@qq.com','pwd'=>'78951234','nick'=>'bird');
        $user[] = array('login'=>'917680415@qq.com','pwd'=>'78951234','nick'=>'bird');
        $user[] = array('login'=>'917680415@qq.com','pwd'=>'78951234','nick'=>'bird');
        $user[] = array('login'=>'917680415@qq.com','pwd'=>'78951234','nick'=>'bird');

//        $id = $userM->addAll($user);
//        var_dump($id);
        $userM->where(array())->distinct(array('key'=>'nick'));

//        $res = $userM->where(array('nick'=>'bird'))->delete();
//        var_dump($res);
        exit;

//        $this->pJaxRender();
    }
}