<?php
error_reporting(0);
define('SITE_PATH', dirname(__FILE__));
define('APP_PATH', SITE_PATH."/application");
define('VIEWS_PATH', APP_PATH."/views");
define('CONTRO_PATH', APP_PATH."/controllers");
define("MODULE_NAME","");
define("MODULE_PATH","models");
define("EXT",".php");
define("MEMORY_LIMIT_ON",true);
define("APP_DEBUG",true);
//xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);//
Yaf_Loader::import(APP_PATH."/common/functions.php");
$application = new Yaf_Application( SITE_PATH . "/conf/application.ini");
$application->bootstrap()->run();
//$xhprof_data = xhprof_disable();
//$runs = new Xhprof_Lib_Utils_Runs();
//$runs->save_run($xhprof_data, 'yaf');