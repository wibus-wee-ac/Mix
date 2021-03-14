<?php
class AdminSetting{

    /**
     * 输出到后台外观设置的css
     * @return string
     */
    public static function styleoutput()
    {
        $themeUrl = THEME_URL;
        $randomColor = admin_helper::getBackgroundColor();
        //$randomColor[0] = "#fff";
        return <<<EOF
<style>
:root{--randomColor0:{$randomColor[0]};--randomColor1:{$randomColor[1]};}
</style>
    <link rel="stylesheet" href="{$themeUrl}assets/css/admin/editor.min.css" type="text/css" />
    <link rel="stylesheet" href="{$themeUrl}assets/css/admin/admin.min.css" type="text/css" />
EOF;
    }

    public static function Welcome(){

        $db = Typecho_Db::get();
        $backupInfo = "";
        if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:Mixbf'))) {
            $backupInfo = '<div class="mdui-chip" style="color: rgb(26, 188, 156);"><span 
        class="mdui-chip-icon mdui-color-green"><i class="mdui-icon material-icons">&#xe8ba;</i></span><span class="mdui-chip-title">数据库存在主题数据备份</span></div>';
        } else {
            $backupInfo = '<div class="mdui-chip" style="color: rgb(26, 188, 156);"><span 
        class="mdui-chip-icon mdui-color-red"><i class="mdui-icon material-icons">&#xe8ba;</i></span><span 
        class="mdui-chip-title" style="color: rgb(255, 82, 82);">没有主题数据备份</span></div>';
        }
        if (!admin_helper::isPluginAvailable("Links_Plugin", "Links")) {
            $pluginInfo = '<div class="mdui-chip" mdui-tooltip="{content: 
    \'' . $pluginExInfo . '\'}" style="color: rgb(26, 188, 156);"><span 
        class="mdui-chip-icon mdui-color-red"><i class="mdui-icon material-icons">&#xe8ba;</i></span><span 
        class="mdui-chip-title" style="color: rgb(255, 82, 82);" >配套插件未启用，请及时安装</span></div>';
        } else {
            $pluginInfo = '<div class="mdui-chip" mdui-tooltip="{content: 
    \'' . $pluginExInfo . '\'}" style="color: rgb(26, 188, 156);"><span 
        class="mdui-chip-icon mdui-color-green"><i class="mdui-icon material-icons">&#xe8ba;</i></span><span class="mdui-chip-title">配套插件已启用</span></div>';
        }
        return <<<EOF
        <div class="mdui-card">
  <!-- 卡片的媒体内容，可以包含图片、视频等媒体内容，以及标题、副标题 -->
  <div class="mdui-card-media">    
    <!-- 卡片中可以包含一个或多个菜单按钮 -->
    <div class="mdui-card-menu">
      <button class="mdui-btn mdui-btn-icon mdui-text-color-white"><i class="mdui-icon material-icons">share</i></button>
    </div>
  </div>
  
  <!-- 卡片的标题和副标题 -->

<div class="mdui-card">

  <!-- 卡片头部，包含头像、标题、副标题 -->
  <div id="Mix_header" class="mdui-card-header" mdui-dialog="{target: '#mail_dialog'}">
    <img class="mdui-card-header-avatar" src="$img"/>
    <div class="mdui-card-header-title">您好</div>
    <div class="mdui-card-header-subtitle">欢迎使用Mix主题，点击查看一封信</div>
  </div>
  
  <!-- 卡片的标题和副标题 -->
<div class="mdui-card-primary mdui-p-t-1">
    <div class="mdui-card-primary-title">Mix {$version} Pro</div>
    <div class="mdui-card-primary-subtitle mdui-row mdui-row-gapless  mdui-p-t-1 mdui-p-l-1">
        <div class="mdui-p-b-1" id="Mix_notice">公告信息</div>

        <!--历史公告-->
        <div class="mdui-chip"  mdui-dialog="{target: '#history_notice_dialog'}" id="history_notice" style="color: 
        #607D8B;"><span 
        class="mdui-chip-icon mdui-color-blue-grey"><i 
        class="mdui-icon material-icons">&#xe86b;</i></span><span 
        class="mdui-chip-title" style="color: #607D8B;">查看历史公告</span></div>
        
        <div id="update_notification" class="mdui-m-r-2">
            <div class="mdui-progress">
                <div class="mdui-progress-indeterminate"></div>
            </div>
            <div class="checking">检查更新中……</div>
        </div>
        
       
                <!--备份情况-->
                {$backupInfo}
                <!--插件情况-->
                {$pluginInfo}

     </div>
  </div>  
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <button class="mdui-btn mdui-ripple"><a href="https://wibus.gitee.io/docs/mix" mdui-tooltip="{content: 
    '主题99%的使用问题都可以通过文档解决，文档有搜索功能快试试！'}"}>使用文档</a></button>
    <button class="mdui-btn mdui-ripple"><a href="https://jq.qq.com/?_wv=1027&k=nIdoRbMY" mdui-tooltip="{content: 
    'Mix主题交流群'}">主题交流群</a></button>
    <button class="mdui-btn mdui-ripple"><a href="https://wibus.gitee.io/docs/mix/#/log" mdui-tooltip="{content: 
    '在这里有管理你的授权一切，还有其他更多'}">开发日志</a></button>
    <button class="mdui-btn mdui-ripple showSettings" mdui-tooltip="{content: 
    '展开所有设置后，使用ctrl+F 可以快速搜索🔍某一设置项'}">展开所有设置</button>
    <button class="mdui-btn mdui-ripple hideSettings">折叠所有设置</button>
    <button class="mdui-btn mdui-ripple recover_back_up" mdui-tooltip="{content: '从主题备份恢复数据'}">从主题备份恢复数据</button>
    <button class="mdui-btn mdui-ripple back_up" 
    mdui-tooltip="{content: '1. 仅仅是备份Mix主题的外观数据</br>2. 切换主题的时候，虽然以前的外观设置的会清空但是备份数据不会被删除。</br>3. 所以当你切换回来之后，可以恢复备份数据。</br>4. 备份数据同样是备份到数据库中。</br>5. 如果已有备份数据，再次备份会覆盖之前备份'}">
    备份主题数据</button>
    <button class="mdui-btn mdui-ripple un_back_up" mdui-tooltip="{content: '删除Mix备份数据'}">删除现有Mix备份</button>
  </div>
  
  
</div>

  
</div>


<div class="mdui-dialog" id="updateDialog">
    <div class="mdui-dialog-content">
      <div class="mdui-dialog-title">更新说明</div>
      <div class="mdui-dialog-content" id="update-dialog-content">获取更新内容失败，请稍后重试</div>
    </div>
    <div class="mdui-dialog-actions">
      <button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
      <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>前往更新</button>
    </div>
  </div>
  
  <div class="mdui-dialog mdui-p-a-5" id="mail_dialog" data-status="0">
  <div class="mdui-spinner mdui-center"></div>
    <div class="mdui-dialog-content mdui-hidden">
      <div class="mdui-dialog-content">
    
        </div>
</div>
    </div>  
    
    
      <div class="mdui-dialog mdui-p-a-5" id="history_notice_dialog" data-status="0">
  <div class="mdui-spinner mdui-center"></div>
    <div class="mdui-dialog-content mdui-hidden">
      <div class="mdui-dialog-content">
    
        </div>
</div>
    </div>    
EOF;
    }
}