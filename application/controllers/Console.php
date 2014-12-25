<?php
class ConsoleController extends BaseController{
	
	public $title = "控制台";
	
	public function init(){
		parent::init();
	}
	
	public function indexAction(){
		$this->pJaxRender();
	}
}