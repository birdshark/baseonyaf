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
				Yaf_Session::getInstance()->__set("user",array("username"=>$username,"nick"=>$user['nick']));
				echo json_encode(array("code"=>200));
			}else{
				echo json_encode(array("code"=>201));
			}
		}
		return false;
	}

	/**
	 * 用户注册
	 */
	public function doRegistAction(){
		$data = $this->getRequest()->getPost();
		$userM = D("User");
		$user = $userM->selectUser($data['login']);
		if(!$user){
			$result = $userM->insertUser($data);
			if($result){
				Yaf_Session::getInstance()->__set("user",array("username"=>$data['login'],"nick"=>$data['login']));
				echo json_encode(array("code"=>200));
			}else{
				echo json_encode(array("code"=>201));
			}
		}else{
			echo json_encode(array("code"=>199));
		}
		return false;
	}
	
	public function doLogoutAction(){
        Yaf_Session::getInstance()->del("user");
		$this->toLogin();
		return false;
	}
}
