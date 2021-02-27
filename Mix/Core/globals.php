<?php
if (Typecho_Widget::widget('Widget_Options')->UseCDNAssets) {
    $GLOBALS['assetURL'] = $this->options->CDNURL;
}else{
    $GLOBALS['assetURL'] = $this->options->themeUrl.'/assets/';
}

?>