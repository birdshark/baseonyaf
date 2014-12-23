<?php
/**
 * Created by PhpStorm.
 * User: bird
 * Date: 2014/12/22
 * Time: 22:21
 */
class TestController extends BaseController{
    public function init(){
        parent::init();
    }

    public function indexAction(){
        $this->pJaxRender();
    }
}