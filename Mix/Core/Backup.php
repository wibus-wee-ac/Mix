<?php
class Backup{
    function echoBackup(){
        $hosturl = $_SERVER['HTTP_HOST'];
        $check_host = 'https://api.iucky.cn/plugins/update/Mix.php';
        $check_message = $check_host . '?a=V1.4.2&u=' . $_SERVER['HTTP_HOST'];
        $message_json = file_get_contents($check_message);
        $json_W = json_decode($message_json);
        $version = $json_W->{'version'};
        $message = $json_W->{'message'};
        $m_ver = '1.4.2';
        if (!$_POST) {
        $str1 = explode('/themes/', Helper::options()->themeUrl);
        $str2 = explode('/', $str1[1]);
        $name = $str2[0];
        $db = Typecho_Db::get();
        $sjdq = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name));
        $ysj = $sjdq['value'];
        if (isset($_POST['type'])) {
            if ($_POST["type"] == "备份模板设置数据") {
                if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                    $update = $db->update('table.options')->rows(array('value' => $ysj))->where('name = ?', 'theme:' . $name . 'bf');
                    $updateRows = $db->query($update);
                    echo '<div class="tongzhi col-mb-12 home">备份已更新，请等待自动刷新！如果等不到请点击';
    ?>   
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
                } else {
                    if ($ysj) {
                        $insert = $db->insert('table.options')->rows(array('name' => 'theme:' . $name . 'bf', 'user' => '0', 'value' => $ysj));
                        $insertId = $db->query($insert);
                        echo '<div class="tongzhi col-mb-12 home">备份完成，请等待自动刷新！如果等不到请点击';
    ?>   
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
                    }
                }
            }
            if ($_POST["type"] == "还原模板设置数据") {
                if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                    $sjdub = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'));
                    $bsj = $sjdub['value'];
                    $update = $db->update('table.options')->rows(array('value' => $bsj))->where('name = ?', 'theme:' . $name);
                    $updateRows = $db->query($update);
                    echo '<div class="tongzhi col-mb-12 home">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
    ?>   
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
    <?php
                } else {
                    echo '<div class="tongzhi col-mb-12 home">没有模板备份数据，恢复不了哦！</div>';
                }
            }
            if ($_POST["type"] == "删除备份数据") {
                if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $name . 'bf'))) {
                    $delete = $db->delete('table.options')->where('name = ?', 'theme:' . $name . 'bf');
                    $deletedRows = $db->query($delete);
                    echo '<div class="tongzhi col-mb-12 home">删除成功，请等待自动刷新，如果等不到请点击';
    ?>   
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
                } else {
                    echo '<div class="tongzhi col-mb-12 home">不用删了！备份不存在！！！</div>';
                }
            }
        }
        echo '<form class="protected home col-mb-12" action="?' . $name . 'bf" method="post">
    <input type="submit" name="type" class="btn btn-s" value="备份模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form><br>';
        if (!$_POST) {
            echo ' 
      </p>
       </div>
       <div class="tab-pane fade" id="jmeter">
          <p>jMeter is an Open Source testing software. It is 100% pure 
          Java application for load and performance testing.</p>
       </div>
       <div class="tab-pane fade" id="ejb">
          <p>';
        }
        }
    }
    
}