<?php
class ConsoleController extends BaseController{
	
	public $title = "控制台";
	
	public function init(){
		parent::init();
	}
	
	public function indexAction(){
		xhprof_enable();
		$this->pJaxRender();
		$xhprof_data = xhprof_disable();
		print_r($xhprof_data);

	}
}