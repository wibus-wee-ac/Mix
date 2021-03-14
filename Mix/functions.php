<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$options = Typecho_Widget::widget('Widget_Options');

if (!defined('THEME_URL')){//主题目录的绝对地址
    define("THEME_URL", rtrim(preg_replace('/^'.preg_quote($options->siteUrl, '/').'/', $options->rootUrl.'/', $options->themeUrl, 1),'/').'/');
}

error_reporting(0);
ini_set('display_errors', 0);

//如果需要显示php错误打开这两行注释
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

/**
 * 主题使用必须引入的组件
 */
require("libs/libs.php"); //最主要依赖
require("libs/Utils.php"); //Utils，在libs.php中需要使用

/**
 * Helper类
 */
require("libs/helper/functions_helper.php"); //一些额外的functions
require("libs/helper/plugins_helper.php"); //使用插件接口实现的东西

/**
 * 主题参数设置应用类
 */
require("Core/Backup.php"); //备份
require("functions_Config.php"); //模板外观设置

/*表单组件*/
require("libs/admin/FormElements.php");
require('libs/admin/Checkbox.php');
require('libs/admin/Text.php');
require('libs/admin/Radio.php');
require('libs/admin/Select.php');
require('libs/admin/Textarea.php');


