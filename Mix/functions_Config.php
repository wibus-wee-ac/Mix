<?php

/*
 * 模板编辑外观设置
 * themeConfig($form){}控制
 */


function themeConfig($form) {

    Backup::echoBackup();
    // Backup::update('1.5.8');
    $form->addItem(new CustomLabel('<div class="mdui-panel" mdui-panel="">'));
    $form->addItem(new Title('外观设置','图标设置,背景设置'));
     //GitHub图标设置
     $HeaderGitHub = new Text('HeaderGitHub', NULL, _t('https://github.com/wibus-wee'), _t('GitHub图标设置'), _t('这里填写的是URL'));
     $form->addInput($HeaderGitHub);
     //QQ图标设置
     $HeaderQQ = new Text('HeaderQQ', NULL, _t('#'), _t('QQ图标设置'), _t('这里填写的是URL'));
     $form->addInput($HeaderQQ);
     //BiliBili图标设置
     $HeaderBiliBili = new Text('HeaderBiliBili', NULL, _t('#'), _t('BiliBili图标设置'), _t('这里填写的是URL'));
     $form->addInput($HeaderBiliBili);
     //第四个图标
     $HeaderFourHTML = new Textarea('HeaderFourHTML', NULL, _t(''), _t('顶部导航栏第四个图标设置'), _t('此处填写HTML'));
     $form->addInput($HeaderFourHTML);


     //BackGroundImage
     $BackGroundImage = new Text('BackGroundImage', NULL, NULL, _t('背景图设置'), _t('此处填写链接URL，若不填写则默认花花背景'));
     $form->addInput($BackGroundImage);
     //BackGroundImage
     $BackGroundImageDark = new Text('BackGroundImageDark', NULL, NULL , _t('<strong style="color: ref">夜间模式</strong> 背景图设置'), _t('此处填写链接URL，若不填写则默认暗色花花背景'));
     $form->addInput($BackGroundImageDark);
     $UseOtherBackGround = new Select('UseOtherBackGround', array(
         '0'=>'不使用（默认）',
         '1'=> '使用'
     ),'0', _t('是否使用额外的一个白色背景防止字体不清晰'), '可以在下面选项填入其他的style');
     $form->addInput($UseOtherBackGround);
     $BackColor = new Text('BackColor', NULL, _t(''), _t('自定义第二背景CSS'), _t('这里填写的需要CSS格式'));
     $form->addInput($BackColor);

    $form->addItem(new EndSymbol(2));
    $form->addItem(new Title('初级设置','首页名称、首页标题后缀、博主的名称、博主的介绍、头部导航栏图标、头像图片地址'));

    //顶部名字
    $cut_off = new Radio('cut_off',array('·' => _t('<code>&nbsp;·&nbsp;</code>'),'-' => _t('<code>&nbsp;-&nbsp;</code>')),'-', _t('首页标题后缀分割线'), _t('请谨慎选择，一旦选择，<b>非特殊情况请不要修改！</b>'));
    $form->addInput($cut_off);  

    //SEO描述
    $HeaderDescription = new Text('HeaderDescription', NULL, _t('Double space mixture'), _t('首页标题后缀'), _t('你的博客标题栏博客名称后面的副标题，如果为空，则不显示副标题</br></br>'));
    $form->addInput($HeaderDescription);  

     //顶部名字
     $HeaderName = new Text('HeaderName', NULL, _t('Wibus'), _t('博主的名称'), _t('这里填写的是文字'));
     $form->addInput($HeaderName);     
     //顶部描述
     $HeaderMore= new Text('HeaderMore', NULL, _t('Just Uaeua'), _t('博主的介绍'), _t('这里填写的是文字'));
     $form->addInput($HeaderMore);   
     //顶部最大头像
     $HeaderPhoto = new Text('HeaderPhoto', NULL, _t('https://q.qlogo.cn/g?b=qq&nk=1596355173&s=640'), _t('头像图片地址'), _t('这里填写的是照片URL'));
     $form->addInput($HeaderPhoto);


    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Title('部件设置','Mix主题不同的部件设置'));

    $Show_what = new Checkbox('Show_what', 
    array(
        'ShowCopyRight' => '显示CopyRight',
        'ShowComment' => '显示评论区',
        'ShowIMouse' => _t('IMouse鼠标🖱️')
    ),
    array('ShowCopyRight','ShowComment', 'ShowIMouse'),_t('全局启动部件'),_t('部件启动选项'));  
        $form->addInput($Show_what->multiMode());


        $headNavStyle = new Select('headNavStyle', array(
            '1'=>'1.0 样式',
            '2'=> '2.0 样式'
        ),'2', _t('头部导航栏使用的样式'), NULL);
        $form->addInput($headNavStyle);
        //顶部导航栏图标
        $HeadNavPhoto = new Textarea('HeadNavPhoto', NULL, _t(''), _t('顶部左侧图片配置'), _t('此处填写HTML代码，可不填写'));
        $form->addInput($HeadNavPhoto);
        //顶部导航自定义2.0
        $headnavItems = new Textarea('headnavItems', NULL, NULL, _t('顶部导航配置（2.0样式）'), '<span style="color:red;">如果不明白此项，请清空该项，可不填写</span>');
        $form->addInput($headnavItems);
    
        $sideBarStyle = new Select('sideBarStyle', array(
            '1'=>'下展开样式',
            '2'=> '右侧展开样式'
        ),'2', _t('手机端菜单栏使用的样式'), NULL);
        $form->addInput($sideBarStyle);
    
        $showIndexStyle = new Select('showIndexStyle', array(
            '1'=>'小卡片',
            '2'=> '纯文字'
        ),'1', _t('首页显示文章使用的样式'), NULL);
        $form->addInput($showIndexStyle);
    
        $Show_what_1 = new Checkbox('Show_what_1', 
        array(
        'ShowHeadSVG' => _t('顶部头像部件（通用）'),
        // 'ShowArticle' => _t('文章'),
        // 'ShowDairy' => _t('日记'),
        'ShowMore' => _t('了解更多（仅1.0）'),
        'ShowAly' => _t('在线人数统计（当底部出现报错时请先对全部目录设置777权限再考虑关闭！）')
        ),
        array('ShowHeadSVG'),_t('启动的部件'),_t('部件启动选项'));  
        $form->addInput($Show_what_1->multiMode());

        $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
        $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
        $form->addItem(new Title('进阶设置','Mix主题的进阶设置'));

        

    //More第一个设置
    $MoreJSON = new Textarea('MoreJSON', NULL, _t(''), _t('了解更多模块设置'), _t('此处填写Json，请看使用文档再进行填写'));
    $form->addInput($MoreJSON);
    // $UseCDNAssets = new Checkbox('UseCDNAssets', array('UseCDNAssets' => _t('使用CDN加速静态资源')), array('UseCDNAssets'), _t(' '));
    $UseCDNAssets = new Select('UseCDNAssets', array(
        '0'=>'不启动（默认）',
        '1'=> '启动'
    ),'0', _t('是否使用CDN加速静态资源'), '<strong style="color:red;">该设置启动需要在下面选项填入链接！</strong>');
    $form->addInput($UseCDNAssets);
    $CDNURL = new Text('CDNURL', NULL, _t(''), _t('自定义CDN加速链接'), _t('这里填写的是URL，若填入资源无法正常载入，请认真看使用文档!'));
    $form->addInput($CDNURL);

    //显示更多url
    $MoreURL = new Text('MoreURL', NULL, _t(''), _t('显示更多文章链接'), _t('这里填写的是URL，填入<code>首页显示更多</code>页面链接，必填！'));
    $form->addInput($MoreURL);
    //友链url
    $FriendURL = new Text('FriendURL', NULL, _t(''), _t('友链内页链接'), _t('这里填写的是URL，填入<code>友链</code>页面链接，可省略'));
    $form->addInput($FriendURL);

    $RSS = new Text('RSS', NULL, _t(''), _t('自定义RSS订阅链接'), _t('这里填写的是RSSURL，RSS订阅将会显示在顶部'));
    $form->addInput($RSS);
    $RSS_Site = new Text('RSS_Site', NULL, _t(''), _t('自定义RSS目标站点链接'), _t('这里填写的是站点URL，不是RSS订阅链接！用于点击跳转至源站！'));
    $form->addInput($RSS_Site);

    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Title('开发者设置','自定义CSS，JavaScript等等'));

    //自定义CSS
    $CSS = new Textarea('CSS', NULL, _t(''), _t('自定义 CSS'), _t('这里填写的是css代码，来进行自定义样式，会自动输出到<\/head>标签之前'));
    $form->addInput($CSS);
    //自定义JavaScript
    $JavaScript = new Textarea('JavaScript', NULL, _t(''), _t('自定义 JavaScript'), _t('这里填写的是JavaScript代码，会自动输出到<\/body>标签之前'));
    $form->addInput($JavaScript);

    //头部自定义输出HTML代码
    $HeaderHTML = new Textarea('HeaderHTML', NULL, _t(''), _t('自定义输出head 头部的HTML代码'), _t('这里填写的是html代码，会输入到<\/head>之前</br>你可以填写网站统计代码等其他信息。</br>网站统计代码推荐google 统计和百度统计，不推荐cnzz（会导致样式错误，如果你会修改样式的话，请忽略该行）'));
    $form->addInput($HeaderHTML);
    //底部自定义输出HTML代码
    $FooterHTML = new Textarea('FooterHTML', NULL, _t(''), _t('自定义输出body 尾部的HTML代码'), _t('这里填写的是html代码，这里填写的是html代码，会输入到<\/body>之前'));
    $form->addInput($FooterHTML);
    //博客底部左侧信息
    $LeftHTML = new Textarea('LeftHTML', NULL, _t(''), _t('博客底部左侧信息'), _t('这里面填写的是 html代码，位置是博客底部的右边。'));
    $form->addInput($LeftHTML);
    //博客底部右侧信息
    $RightHTML = new Textarea('RightHTML', NULL, _t(''), _t('博客底部右侧信息'), _t('这里面填写的是 html代码，位置是博客底部的右边。'));
    $form->addInput($RightHTML);

    $debug = new Select('debug', array(
        '0'=>'生产环境（默认）',
        '1'=> '调试环境（调试推荐）',
        '2'=> '开发环境（开发推荐）'
    ),'0', _t('Debug模式'), '<strong style="color:red;">如果你不懂此选项，请不要随便选择！</strong>');
    $form->addInput($debug);

    
    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Title('Pjax设置','设置Mix主题的Pjax功能'));

    $PjaxOption = new Select('PjaxOption', array(
        'jQueryPjax' => _t('jQuery版 Pjax'),
        'MoOxPjax' => _t('MoOx版 Pjax（强烈推荐！）')
    ),'MoOxPjax', _t('主题使用的Pjax版本'), NULL);
    $form->addInput($PjaxOption);
    //Pjax重载
    $PjaxReLoad = new Textarea('PjaxReLoad', NULL, _t(''), _t('Pjax重载函数'), _t('这里面填写的是代码，用于重载Pjax函数'));
    $form->addInput($PjaxReLoad);

    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Title('更多外观设置','设置元素动画'));
    
    $IndexAction = new Text('IndexAction', NULL, _t('fade-larger-small 1s'), _t('首页文章卡片动画'), _t('默认值：fade-larger-small 1s'));
    $form->addInput($IndexAction);
    $LinksAction = new Text('LinksAction', NULL, _t('fade-in-top 1s'), _t('文章归档页, 友链页链接动画'), _t('默认值：fade-in-top 1s'));
    $form->addInput($LinksAction);


    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Title('IMouse设置','IMouse鼠标，只有全局启动部件中启动才有效'));

    $IMouseDefaultBackgroundColor = new Text('IMouseDefaultBackgroundColor', NULL, _t('\'rgba(1, 80, 111, .1)\''), _t('非 hover 默认状态下的光标背景颜色，CSS 格式'), _t('默认值：\'rgba(1, 80, 111, .1)\''));
    $form->addInput($IMouseDefaultBackgroundColor);
    $IMouseActiveBackgroundColor = new Text('IMouseActiveBackgroundColor', NULL, _t('\'rgba(1, 80, 111, .15)\''), _t('非 hover 按下状态下的光标背景颜色，CSS 格式'), _t('默认值：\'rgba(1, 80, 111, .15)\''));
    $form->addInput($IMouseActiveBackgroundColor);
    $IMouseDefaultSize = new Text('IMouseDefaultSize', NULL, _t('20'), _t('非 hover 默认状态下的光标直径'), _t('默认值：20'));
    $form->addInput($IMouseDefaultSize);
    $IMouseActiveSize = new Text('IMouseActiveSize', NULL, _t('15'), _t('非 hover 按下状态下的光标直径'), _t('默认值：15'));
    $form->addInput($IMouseActiveSize);
    $IMouseHoverPadding = new Text('IMouseHoverPadding', NULL, _t('8'), _t('hover 状态下的光标 padding 大小'), _t('默认值：8'));
    $form->addInput($IMouseHoverPadding);
    $IMouseActivePadding = new Text('IMouseActivePadding', NULL, _t('4'), _t('hover 按下状态下的光标 padding 大小'), _t('默认值：4'));
    $form->addInput($IMouseActivePadding);
    $IMouseHoverRadius = new Text('IMouseHoverRadius', NULL, _t('8'), _t('hover 状态下的光标圆角半径'), _t('默认值：8'));
    $form->addInput($IMouseHoverRadius);
    $IMouseActiveRadius = new Text('IMouseActiveRadius', NULL, _t('4'), _t('hover 按下状态下的光标圆角半径
    '), _t('默认值：4'));
    $form->addInput($IMouseActiveRadius);
    $IMouseSelectionWidth = new Text('IMouseSelectionWidth', NULL, _t('3'), _t('文字选择状态下的光标宽度'), _t('默认值：3'));
    $form->addInput($IMouseSelectionWidth);
    $IMouseSelectionHeight = new Text('IMouseSelectionHeight', NULL, _t('40'), _t('文字选择状态下的光标高度'), _t('默认值：40'));
    $form->addInput($IMouseSelectionHeight);
    $IMouseSelectionRadius = new Text('IMouseSelectionRadius', NULL, _t('2'), _t('文字选择状态下的光标圆角半径'), _t('默认值：2'));
    $form->addInput($IMouseSelectionRadius);

    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));
    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));

    //mdui-panel 结束符
    $form->addItem(new Typecho_Widget_Helper_Layout("/div"));

    $submit = new Typecho_Widget_Helper_Form_Element_Submit(NULL, NULL, _t('保存设置'));
    $submit->input->setAttribute('class', 'mdui-btn mdui-color-theme-accent mdui-ripple submit_only');
    $form->addItem($submit);
}

/*
 * 编写文章设置
 * themeFields(Typecho_Widget_Helper_Layout $layout){}控制
 */
function themeFields(Typecho_Widget_Helper_Layout $layout){


    $PostChoice = new Typecho_Widget_Helper_Form_Element_Select('PostChoice', array(
        '0'=>'文章样式',
        '1'=> '日记样式'
    ),'0', _t('当前文章页面样式类型'), '<strong style="color:red;">该设置仅对该篇文章有效</strong></br>默认选项是「文章」样式</br> 选择「日记」当前文章页面样式将会改为日记样式</br>不建议文章使用日记样式，日记使用文章样式');
    $layout->addItem($PostChoice);

}