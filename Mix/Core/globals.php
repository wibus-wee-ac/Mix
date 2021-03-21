<?php
/*
 * @Name: globals.php
 * @author: Wibus
 * @Date: 2021-03-15 22:51:31
 * @LastEditors: Wibus
 * @LastEditTime: 2021-03-21 10:55:29
 */
if (Typecho_Widget::widget('Widget_Options')->UseCDNAssets) {
    $GLOBALS['assetURL'] = Typecho_Widget::widget('Widget_Options')->CDNURL;
}else{
    $GLOBALS['assetURL'] = Typecho_Widget::widget('Widget_Options')->themeUrl.'/assets/';
}
?>