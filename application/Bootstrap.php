<?php
/**
 * @name Bootstrap
 * @author bird_shark\bird
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf_Bootstrap_Abstract{
	
	public function _initNamespaces(){
		Yaf_Loader::getInstance()->registerLocalNameSpace(array("Smarty","Db"));
	}
    public function _initConfig() {
		//把配置保存起来
		$arrConfig = Yaf_Application::app()->getConfig();
		Yaf_Registry::set('config', $arrConfig);
	}

	public function _initPlugin(Yaf_Dispatcher $dispatcher) {
		//注册一个插件
		$objSamplePlugin = new CommonPlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

    public function _initDatabase(){
//        $config = Yaf\Registry::get('config');
    }

	public function _initRoute(Yaf_Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
	}

	public function _initView(Yaf_Dispatcher $dispatcher){
//		$smarty = new Smarty_Adapter(null, Yaf_Application::app()->getConfig()->smarty);
//		$dispatcher->setView($smarty);
	}
}
