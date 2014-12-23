<?php
class MoreController extends BaseController{
	public $title = "更多";
	
	public function init(){
		parent::init();
	}
	public function profileAction(){
		$this->pJaxRender();
	}

	public function inboxAction(){
		$this->pJaxRender();
	}
	
	public function invoiceAction(){
		$this->pJaxRender();
	}
	
	public function loginAction(){
		$this->pJaxRender();
	}
	public function pricingAction(){
		$this->pJaxRender();
	}
	public function timelineAction(){
		$this->pJaxRender();
	}
}