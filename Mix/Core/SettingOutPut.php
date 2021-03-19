<?php
if (preg_match("/options-theme.php/", $_SERVER['REQUEST_URI'])) {
    $stylehtml = AdminSetting::styleoutput();
    $welcome = AdminSetting::Welcome();
    echo $stylehtml;
    //echo $welcome;
}