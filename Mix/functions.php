<?php
/*
 * @Name: functions.php
 * @author: Wibus
 * @Date: 2021-03-15 22:51:29
 * @LastEditors: Wibus
 * @LastEditTime: 2021-03-21 10:54:58
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$options = Typecho_Widget::widget('Widget_Options');

if (!defined('THEME_URL')){//主题目录的绝对地址
    define("THEME_URL", rtrim(preg_replace('/^'.preg_quote($options->siteUrl, '/').'/', $options->rootUrl.'/', $options->themeUrl, 1),'/').'/');
}
if (!defined("BLOG_URL")){
    define("BLOG_URL",$options->rootUrl."/");
}
if ($options->rewrite == 1){//定义博客php的地址，判断是否开启了伪静态
    if(!defined('BLOG_URL_PHP'))
        define("BLOG_URL_PHP",BLOG_URL);
}else{
    if(!defined('BLOG_URL_PHP'))
        define("BLOG_URL_PHP",BLOG_URL.'index.php/');
}
// if (!defined("THEME_FILE")){
//     define("THEME_FILE",total::returnThemePath());
// }
if (!defined("STATIC_PATH")){
    define('STATIC_PATH',''.$GLOBALS['assetURL'].'');
}
/**
 * 主题使用必须引入的组件
 */
require("libs/libs.php"); //最主要依赖
require("libs/Utils.php"); //Utils，在libs.php中需要使用
require("Core/globals.php");

/**
 * Helper类
 */
require("libs/helper/functions_helper.php"); //一些额外的functions
require("libs/helper/plugins_helper.php"); //使用插件接口实现的东西
require("libs/helper/Admin_Helper.php");
require("libs/helper/AdminSetting.php"); 

/**
 * 主题参数设置应用类
 */
require("Core/Backup.php"); //备份
require("functions_Config.php"); //模板外观设置
require("Core/SettingOutPut.php"); //输出前部控制

/*表单组件*/
require("libs/admin/FormElements.php");
require('libs/admin/Checkbox.php');
require('libs/admin/Text.php');
require('libs/admin/Radio.php');
require('libs/admin/Select.php');
require('libs/admin/Textarea.php');


