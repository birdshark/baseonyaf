<?php
class GridController extends BaseController{
	
	public $title = "表格";
	
	public function init(){
		parent::init();
	}
	
	public function tablesAction(){
		$this->pJaxRender();
	}
	public function jqgridAction(){
		$this->pJaxRender();
	}
}