<?php
class WidgetsController extends BaseController{
	
	public $title = "插件";
	public function init(){
		parent::init();
	}
	
	public function indexAction(){
		$this->pJaxRender();
	}
}