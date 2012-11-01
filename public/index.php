<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/../protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// system define
defined('EC_FOUNDER') or define('EC_FOUNDER', 1);
defined('EC_OPERATOR') or define('EC_OPERATOR', 2);
defined('EC_USER') or define('EC_USER', 3);

require_once($yii);
Yii::createWebApplication($config)->run();
