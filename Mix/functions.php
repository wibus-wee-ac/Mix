<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;


error_reporting(0);
ini_set('display_errors', 0);

//如果需要显示php错误打开这两行注释
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

require("libs/libs.php"); //Tool
require("libs/Utils.php"); //Tool
require("libs/functions_helper.php"); //function
require("libs/plugins_helper.php"); //Plugins
require("Core/Backup.php");

/*
 * 模板编辑外观设置
 * themeConfig($form){}控制
 */

/*
 * 编写文章设置
 * themeFields(Typecho_Widget_Helper_Layout $layout){}控制
 */
function themeFields(Typecho_Widget_Helper_Layout $layout){


    $PostChoice = new Typecho_Widget_Helper_Form_Element_Select('PostChoice', array(
        '0'=>'文章样式',
        '1'=> '日记样式'
    ),'0', _t('当前文章页面样式类型'), '<strong style="color:red;">该设置仅对该篇文章有效</strong></br>默认选项是「文章」样式</br> 选择「日记」当前文章页面样式将会改为日记样式</br>不建议文章使用日记样式，日记使用文章样式');
    $layout->addItem($PostChoice);

}
?>
