<?php


// echo '<script src="https://cdn.jsdelivr.net/npm/mdui@0.4.3/dist/js/mdui.min.js"></script>
// <script src="https://cdn.staticfile.org/jquery/2.2.4/jquery.min.js" type="text/javascript"></script>
// <style>
// :root{--randomColor0:#673AB7;--randomColor1:#512DA8;}
// </style>
// <script src="https://blog.iucky.cn/usr/themes/handsome/assets/js/admin/admin.min.js" type="text/javascript"></script>
// <link rel="stylesheet" href="https://blog.iucky.cn/usr/themes/handsome/assets/css/admin/admin.min.css?v=7.3.12020081501" type="text/css">
// <link rel="stylesheet" href="https://blog.iucky.cn/usr/themes/handsome/assets/css/admin/editor.min.css?v=7.3.12020081501" type="text/css">
// <link href="https://cdn.jsdelivr.net/npm/mdui@0.4.3/dist/css/mdui.min.css" rel="stylesheet">
// ';

class admin_helper{
    public static function getBackgroundColor()
        {
            $colors = array(
                array('#673AB7', '#512DA8'),
                array('#20af42', '#1a9c39'),
                array('#336666', '#2d4e4e'),
                array('#2e3344', '#232735')
            );
            $randomKey = array_rand($colors, 1);
            $randomColor = $colors[$randomKey];
            return $randomColor;
        }
    public static function isPluginAvailable($className, $dirName)
    {
        if (class_exists($className)) {
            $plugins = Typecho_Plugin::export();
            $plugins = $plugins['activated'];
            if (is_array($plugins) && array_key_exists($dirName, $plugins)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }
}
