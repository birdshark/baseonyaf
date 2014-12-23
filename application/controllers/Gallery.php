<?php
class GalleryController extends BaseController{
	
	public $title = "相册";
	
	public function init(){
		parent::init();
	}
	
	public function indexAction(){
		$this->pJaxRender();
	}
}