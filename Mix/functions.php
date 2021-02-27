<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;


error_reporting(0);
ini_set('display_errors', 0);

//如果需要显示php错误打开这两行注释
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

require("libs/libs.php"); //最主要依赖
require("libs/Utils.php"); //Utils，在libs.php中需要使用
require("libs/functions_helper.php"); //other function
require("libs/plugins_helper.php"); //使用插件接口实现的东西
require("Core/Backup.php"); //备份
require("functions_Config.php"); //模板外观设置

