<?php
class OtherController extends BaseController{
	
	public $title = "其他";
	
	public function init(){
		parent::init();
	}
	
	public function faqAction(){
		$this->pJaxRender();
	}
	
	public function error404Action(){
		$this->pJaxRender();
	}
	
	public function error500Action(){
		$this->pJaxRender();
	}
	
	public function gridAction(){
		$this->pJaxRender();
	}
	
	public function blankAction(){
		$this->pJaxRender();
	}
}