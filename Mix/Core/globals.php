<?php
/*
 * @Name: globals.php
 * @author: Wibus
 * @Date: 2021-03-15 22:51:31
 * @LastEditors: Wibus
 * @LastEditTime: 2021-03-27 15:04:32
 */
$GLOBALS['options'] = Typecho_Widget::widget('Widget_Options');
if ($GLOBALS['options']->UseCDNAssets) {
    $GLOBALS['assetURL'] = $GLOBALS['options']->CDNURL;
}else{
    $GLOBALS['assetURL'] = $GLOBALS['options']->themeUrl.'/assets/';
}
?>