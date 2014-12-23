<?php
class WordController extends BaseController{

	public $title = "文字排版";

	public function init(){
		parent::init();

	}

	public function indexAction(){
        $this->pJaxRender();
	}
}