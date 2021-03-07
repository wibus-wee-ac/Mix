<?php
class Backup{
    function echoBackup(){
        $hosturl = $_SERVER['HTTP_HOST'];
        $check_host = 'https://api.iucky.cn/plugins/update/Mix.php';
        $check_message = $check_host . '?a=V1.4.0&u=' . $_SERVER['HTTP_HOST'];
        $message_json = file_get_contents($check_message);
        $json_W = json_decode($message_json);
        $version = $json_W->{'version'};
        $message = $json_W->{'message'};
        $m_ver = '1.4.0';
        if (!$_POST) {
            echo ' 
            <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.staticfile.org/jquery/2.0.0/jquery.js"></script>
            <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <hr>
       <p class="active-tab"><strong><svg  class="icon mix_aliico" aria-hidden="true"><use xlink:href="#icon-project"></use></svg> Mix 双重空间混合体</strong> <span></span></p>
       <p class="previous-tab"><strong><svg  class="icon mix_aliico" aria-hidden="true"><use xlink:href="#icon-chicken"></use></svg> 主题版本号: </strong>'.$m_ver.' <span></span></p>
    <hr>
    <ul id="myTab" class="nav nav-tabs">
       <li class="active"><a href="#home" data-toggle="tab">版本与特性</a></li>
       <li><a href="#ios" data-toggle="tab">备份与恢复</a></li>
       <li><a href="#ejb" tabindex="-1" data-toggle="tab">关于主题</a></li> 
    </ul>
    <div id="myTabContent" class="tab-content">
       <div class="tab-pane fade in active" id="home">
          <p>
          
          ';
        }
        if ($m_ver == $version) {
            echo '当前版本：' . 'V' . $m_ver . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '最新版本:' . 'V' . $version;
        } else if ($v_time > $message) {
            echo '当前版本：' . 'V' . $m_ver . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . 'V' . $version;
        } else if ($v_time < $message) {
            echo '当前版本：' . 'V' . $m_ver . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '发现新版本:' . '<span style="color:red;"><b>V ' . $version. '</b></span>&nbsp&nbsp请更新<a href="https://iucky.cn/posts/works/how-to-develop-mix-typecho" target="_blank">新版本特性</a>';
        }
        if (!$_POST) {
            echo '
            </p>
       </div>
       <div class="tab-pane fade" id="ios">
          <p>
        ';
        }
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
        echo '
     
     <div class="mix_ht_about">
     <div class="mix_ht_about_img"><a href="https://jq.qq.com/?_wv=1027&k=nIdoRbMY" target="_blank"><img src="https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/rec_Wibus.jpg" width="80%" "/></a>
     <div class="mix_ht_about_mian">
     <p style="font-size:15px;margin-top: 6px !important;"><b> 双重空间混合体</b></p> 
     <p>Mix主题交流群：<a href="https://jq.qq.com/?_wv=1027&k=nIdoRbMY" target="_blank">点击加入</a></p>
     <p>本主题由<a href="https://iucky.cn"target="_blank">Wibus</a>开源发布，禁止倒卖<svg  class="icon mix_aliico" aria-hidden="true"><use xlink:href="#icon-chicken"></use></svg></p>
     </div>
     </div>
     </div>
     ';
        if (!$_POST) {
            echo '      </p>
       </div>
    </div>';
        }
        print <<<EOT
    <style>
    .mix_ht_about{
        margin:0px;
    }
    .mix_ht_about a{ 
        color: #060606;
    }
    .mix_ht_about_img{
        float:initial;
    }
    .mix_ht_about img {
        float: initial;
        width: 50%;
        border-radius: 5px;
        box-shadow: 0 8px 10px -4px rgba(66, 172, 98, 0.34);
    }
    .mix_ht_about_mian{
        width: 50%;
        float: right;
        padding:0px 0px 0px  20px ;
    }
    .mix_ht_about_mian  h2 {
        color:#000;
        margin:0px;
    }
    .btn { 
        color:#000;
        padding: 0px 10px;
        border-radius: 4px;
        background-color: whitesmoke;
        box-shadow: 0 6px 7px -5px rgba(210, 210, 210, 0.6);
    }
    p{
        margin:15px 0px 10px 0px!important;
    }
    .mix_aliico{
        width: 20px;
        float: initial;
        height: 20px;
        margin-bottom: -4px;
    }
    </style> 
    <link rel="stylesheet" href="https://at.alicdn.com/t/font_1953461_6q2rg8z45q4.css">  
    <script src="https://at.alicdn.com/t/font_1953461_6q2rg8z45q4.js"></script> 
    <script>
       $(function(){
          $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          // Get the name of active tab
          var activeTab = $(e.target).text(); 
          // Get the name of previous tab
          var previousTab = $(e.relatedTarget).text(); 
          $(".active-tab span").html(activeTab);
          $(".previous-tab span").html(previousTab);
       });
    });
    </script>
EOT;
        echo '<hr>
    <svg  class="icon mix_aliico" aria-hidden="true"><use xlink:href="#icon-sound"></use></svg>
    <span>  '.$message.'</span>';
       
    
    }
    
}