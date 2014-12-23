<?php
class BaseController extends Yaf\Controller_Abstract{

	public function init(){
		//如果为PJAX则手动返回
		if(array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']){
			Yaf\Dispatcher::getInstance()->disableView();
			Yaf\Dispatcher::getInstance()->autoRender(false);
			$this->getView()->assign("pjax",true);
		}
		$this->getView()->assign("title",$this->title);
		$this->getView()->assign("user",Yaf\Session::getInstance()->get("user"));
		$action = $this->getRequest()->getActionName();
		if(($action!=="dologout")){
			 $this->_check_login();
		}
	}
	
	private function _check_login(){
		$controll = $this->getRequest()->getControllerName();
		if(Yaf\Session::getInstance()->has("user")){
			if($controll == "Index"){
				$this->toHome();
			}
		}elseif(empty($user)){
			if($controll != "Index"){
				$this->toLogin();
			}
		}
	}
	
	public function toLogin(){
		$this->getResponse()->setRedirect("/");
	}
	
	protected function toHome(){
		$this->getResponse()->setRedirect("/console/");
	}

	protected function pJaxRender(){
		if(array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']){
			echo $this->getView()->render($this->getViewPath()[0].$this->getRequest()->getControllerName()."/".$this->getRequest()->getActionName().".phtml");
			return false;
		}else{
			return true;
		}
	}
}