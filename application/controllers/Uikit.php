<?php
class UikitController extends BaseController{
	
	public $title = "UI组件";
	
	public function init(){
		parent::init();
	}
	
	public function elementsAction(){
		$this->pJaxRender();
	}
	
	public function buttonsAction(){
		$this->pJaxRender();
	}
	
	public function treeviewAction(){
		$this->pJaxRender();
	}
	
	public function jqueryuiAction(){
		$this->pJaxRender();
	}
	
	public function nestablelistAction(){
		$this->pJaxRender();
	}
}