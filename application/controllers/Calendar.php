<?php
class CalendarController extends BaseController{
	
	public $title = "日历";
	
	public function init(){
		parent::init();
	}
	
	
	public function indexAction(){
		$this->pJaxRender();
	}
}