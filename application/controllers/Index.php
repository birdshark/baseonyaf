<?php
/**
 * @name IndexController
 * @author bird_shark\bird
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends BaseController {
	
	public $title = "登陆";
	
	public function init(){
		parent::init();
	}

	public function indexAction() {
        return true;
	}
	
	public function doLoginAction(){
		$username = $this->getRequest()->getPost("username","");
		$password = $this->getRequest()->getPost("password","");
		$userM = D("User");
		$user = $userM->selectUser($username);
		if(!$user){
			echo json_encode(array("code"=>201));
			exit;
		}else{
			if($username==$user['login']&&$password==$user['pwd']){
				Yaf\Session::getInstance()->__set("user",array("username"=>$username,"nick"=>$user['nick']));
				echo json_encode(array("code"=>200));
			}else{
				echo json_encode(array("code"=>201));
			}
		}
		return false;
	}
	
	public function doLogoutAction(){
        Yaf\Session::getInstance()->del("user");
		$this->toLogin();
		return false;
	}
}
