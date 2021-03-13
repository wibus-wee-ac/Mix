<?php
if (Typecho_Widget::widget('Widget_Options')->UseCDNAssets) {
    $GLOBALS['assetURL'] = Typecho_Widget::widget('Widget_Options')->CDNURL;
}else{
    $GLOBALS['assetURL'] = Typecho_Widget::widget('Widget_Options')->themeUrl.'/assets/';
}

?>