<?php
/*
 * @Name: SettingOutPut.php
 * @author: Wibus
 * @Date: 2021-03-15 22:59:46
 * @LastEditors: Wibus
 * @LastEditTime: 2021-04-03 08:08:50
 */
if (preg_match("/options-theme.php/", $_SERVER['REQUEST_URI'])) {
    $stylehtml = AdminSetting::styleoutput();
    $welcome = AdminSetting::Welcome();
    echo $stylehtml;
    echo $welcome;
    if($options->debug != 2){ //如果不是开发模式的话就不屏蔽
        error_reporting(0);
        ini_set('display_errors', 0);
    }elseif ($options->debug == 2) {
        echo "<script>
        mdui.snackbar({
            message: '您当前处于的开发模式已屏蔽更新提示<br/>关闭请前往选项开发者设置-Debug模式选择默认选项'
        });
        </script>";
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    }
    $hosturl = $_SERVER['HTTP_HOST'];
    $check_host = 'https://api.iucky.cn/plugins/update/Mix.php';
    $check_message = $check_host . '?a=V2.0.0&u=' . $_SERVER['HTTP_HOST'];
    $message_json = file_get_contents($check_message);
}