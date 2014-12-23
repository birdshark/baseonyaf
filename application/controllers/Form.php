<?php
class FormController extends BaseController{
	public $title = "表单";
	
	public function init(){
		parent::init();
	}
	
	public function elementsAction(){
		$this->pJaxRender();
	}
	
	public function wizardAction(){
		$this->pJaxRender();
	}
	
	public function wysiwygAction(){
		$this->pJaxRender();
	}
	
	public function dropzoneAction(){
		$this->pJaxRender();
	}
}