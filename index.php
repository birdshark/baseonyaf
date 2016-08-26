<?php
define('SITE_PATH', dirname(__FILE__));
define('APP_PATH', SITE_PATH."/application");
define('VIEWS_PATH', APP_PATH."/views");
define('CONTRO_PATH', APP_PATH."/controllers");
Yaf_Loader::import(APP_PATH."/common/functions.php");
$application = new Yaf_Application( SITE_PATH . "/conf/application.ini");
$application->bootstrap()->run();