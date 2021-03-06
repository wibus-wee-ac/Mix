<?php

/*
 * 模板编辑外观设置
 * themeConfig($form){}控制
 */


function themeConfig($form) {

    Backup::echoBackup();

    $form->addItem(new Typecho_Widget_Helper_Layout("h3> SEO设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 仅辅助优化SEO，主要请前往typecho基本设置！ </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));

    //顶部名字
    $cut_off = new Typecho_Widget_Helper_Form_Element_Radio('cut_off',
        array(
            '·' => _t('<code>&nbsp;·&nbsp;</code>'),
            '-' => _t('<code>&nbsp;-&nbsp;</code>')
        ),
        '-', _t('站点标题与描述之间的分割线'), _t('请谨慎选择，一旦选择，<b>非特殊情况请不要修改！</b>'));
    $form->addInput($cut_off);  

    //SEO描述
    $HeaderDescription = new Typecho_Widget_Helper_Form_Element_Text('HeaderDescription', NULL, _t('Double space mixture'), _t('SEO描述'), _t('这里填写的是文字'));
    $form->addInput($HeaderDescription);  

    $form->addItem(new Typecho_Widget_Helper_Layout("h3> 基本设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 设置主题的基本功能 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));
    $Show_what = new Typecho_Widget_Helper_Form_Element_Checkbox('Show_what', 
    array(
        'ShowCopyRight' => '显示CopyRight',
        'ShowComment' => '显示评论区',
        'ShowIMouse' => _t('IMouse鼠标🖱️')
    ),
    array('ShowCopyRight','ShowComment', 'ShowIMouse'),_t('全局启动部件'),_t('部件启动选项'));  
        $form->addInput($Show_what->multiMode());
    //顶部名字
    $HeaderName = new Typecho_Widget_Helper_Form_Element_Text('HeaderName', NULL, _t('Wibus'), _t('顶部名字'), _t('这里填写的是文字'));
    $form->addInput($HeaderName);     
    //顶部描述
    $HeaderMore= new Typecho_Widget_Helper_Form_Element_Text('HeaderMore', NULL, _t('Just Uaeua'), _t('顶部描述'), _t('这里填写的是文字'));
    $form->addInput($HeaderMore);   
    //顶部最大头像
    $HeaderPhoto = new Typecho_Widget_Helper_Form_Element_Text('HeaderPhoto', NULL, _t('https://q.qlogo.cn/g?b=qq&nk=1596355173&s=640'), _t('顶部最大头像'), _t('这里填写的是照片URL'));
    $form->addInput($HeaderPhoto);
    //GitHub图标设置
    $HeaderGitHub = new Typecho_Widget_Helper_Form_Element_Text('HeaderGitHub', NULL, _t('https://github.com/wibus-wee'), _t('GitHub图标设置'), _t('这里填写的是URL'));
    $form->addInput($HeaderGitHub);
    //QQ图标设置
    $HeaderQQ = new Typecho_Widget_Helper_Form_Element_Text('HeaderQQ', NULL, _t('#'), _t('QQ图标设置'), _t('这里填写的是URL'));
    $form->addInput($HeaderQQ);
    //BiliBili图标设置
    $HeaderBiliBili = new Typecho_Widget_Helper_Form_Element_Text('HeaderBiliBili', NULL, _t('#'), _t('BiliBili图标设置'), _t('这里填写的是URL'));
    $form->addInput($HeaderBiliBili);
    //第四个图标
    $HeaderFourHTML = new Typecho_Widget_Helper_Form_Element_Textarea('HeaderFourHTML', NULL, _t(''), _t('顶部导航栏第四个图标设置'), _t('此处填写HTML'));
    $form->addInput($HeaderFourHTML);
    //BackGroundImage
    $BackGroundImage = new Typecho_Widget_Helper_Form_Element_Text('BackGroundImage', NULL, NULL, _t('背景图设置'), _t('此处填写链接URL，若不填写则默认花花背景'));
    $form->addInput($BackGroundImage);
    //BackGroundImage
    $BackGroundImageDark = new Typecho_Widget_Helper_Form_Element_Text('BackGroundImageDark', NULL, NULL , _t('<strong style="color: ref">夜间模式</strong> 背景图设置'), _t('此处填写链接URL，若不填写则默认暗色花花背景'));
    $form->addInput($BackGroundImageDark);
    $UseOtherBackGround = new Typecho_Widget_Helper_Form_Element_Select('UseOtherBackGround', array(
        '0'=>'不使用（默认）',
        '1'=> '使用'
    ),'0', _t('是否使用额外的一个白色背景防止字体不清晰'), '可以在下面选项填入其他的style');
    $form->addInput($UseOtherBackGround);
    $BackColor = new Typecho_Widget_Helper_Form_Element_Text('BackColor', NULL, _t(''), _t('自定义第二背景CSS'), _t('这里填写的需要CSS格式'));
    $form->addInput($BackColor);

    $form->addItem(new Typecho_Widget_Helper_Layout("h3> 进阶设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 设置主题的进阶功能 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));

    //More第一个设置
    $MoreJSON = new Typecho_Widget_Helper_Form_Element_Textarea('MoreJSON', NULL, _t(''), _t('了解更多模块设置'), _t('此处填写Json，请看使用文档再进行填写'));
    $form->addInput($MoreJSON);
    // $UseCDNAssets = new Typecho_Widget_Helper_Form_Element_Checkbox('UseCDNAssets', array('UseCDNAssets' => _t('使用CDN加速静态资源')), array('UseCDNAssets'), _t(' '));
    $UseCDNAssets = new Typecho_Widget_Helper_Form_Element_Select('UseCDNAssets', array(
        '0'=>'不启动（默认）',
        '1'=> '启动'
    ),'0', _t('是否使用CDN加速静态资源'), '<strong style="color:red;">该设置启动需要在下面选项填入链接！</strong>');
    $form->addInput($UseCDNAssets);
    $CDNURL = new Typecho_Widget_Helper_Form_Element_Text('CDNURL', NULL, _t(''), _t('自定义CDN加速链接'), _t('这里填写的是URL，若填入资源无法正常载入，请认真看使用文档!'));
    $form->addInput($CDNURL);

    //显示更多url
    $MoreURL = new Typecho_Widget_Helper_Form_Element_Text('MoreURL', NULL, _t(''), _t('显示更多文章链接'), _t('这里填写的是URL，填入<code>首页显示更多</code>页面链接，必填！'));
    $form->addInput($MoreURL);
    //友链url
    $FriendURL = new Typecho_Widget_Helper_Form_Element_Text('FriendURL', NULL, _t(''), _t('友链内页链接'), _t('这里填写的是URL，填入<code>友链</code>页面链接，可省略'));
    $form->addInput($FriendURL);


    $form->addItem(new Typecho_Widget_Helper_Layout("h3> 样式配置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 设置主题的样式 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));
    $headNavStyle = new Typecho_Widget_Helper_Form_Element_Select('headNavStyle', array(
        '1'=>'1.0 样式',
        '2'=> '2.0 样式'
    ),'0', _t('头部导航栏使用的样式'), NULL);
    $form->addInput($headNavStyle);
    //顶部导航栏图标1.0
    $HeadNavPhoto = new Typecho_Widget_Helper_Form_Element_Textarea('HeadNavPhoto', NULL, _t(''), _t('顶部导航栏图标配置（1.0样式）'), _t('此处填写HTML代码，可不填写'));
    $form->addInput($HeadNavPhoto);
    //顶部导航自定义2.0
    $headnavItems = new Typecho_Widget_Helper_Form_Element_Textarea('headnavItems', NULL, NULL, _t('顶部导航配置（2.0样式）'), '<span style="color:red;">如果不明白此项，请清空该项，可不填写</span>');
    $form->addInput($headnavItems);

    $showIndexStyle = new Typecho_Widget_Helper_Form_Element_Select('showIndexStyle', array(
        '1'=>'小卡片',
        '2'=> '纯文字'
    ),'1', _t('首页显示文章使用的样式'), NULL);
    $form->addInput($showIndexStyle);

    $Show_what_1 = new Typecho_Widget_Helper_Form_Element_Checkbox('Show_what_1', 
    array(
    'ShowHeadSVG' => _t('顶部头像部件（通用）'),
    // 'ShowArticle' => _t('文章'),
    // 'ShowDairy' => _t('日记'),
    'ShowMore' => _t('了解更多（仅1.0）'),
    ),
    array('ShowHeadSVG'),_t('启动的部件'),_t('部件启动选项'));  
    $form->addInput($Show_what_1->multiMode());

    $form->addItem(new Typecho_Widget_Helper_Layout("h3> 开发者设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 设置主题的开发者功能，如JavaScript, CSS等 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));

    //自定义CSS
    $CSS = new Typecho_Widget_Helper_Form_Element_Textarea('CSS', NULL, _t(''), _t('自定义 CSS'), _t('这里填写的是css代码，来进行自定义样式，会自动输出到<\/head>标签之前'));
    $form->addInput($CSS);
    //自定义JavaScript
    $JavaScript = new Typecho_Widget_Helper_Form_Element_Textarea('JavaScript', NULL, _t(''), _t('自定义 JavaScript'), _t('这里填写的是JavaScript代码，会自动输出到<\/body>标签之前'));
    $form->addInput($JavaScript);

    //头部自定义输出HTML代码
    $HeaderHTML = new Typecho_Widget_Helper_Form_Element_Textarea('HeaderHTML', NULL, _t(''), _t('自定义输出head 头部的HTML代码'), _t('这里填写的是html代码，会输入到<\/head>之前</br>你可以填写网站统计代码等其他信息。</br>网站统计代码推荐google 统计和百度统计，不推荐cnzz（会导致样式错误，如果你会修改样式的话，请忽略该行）'));
    $form->addInput($HeaderHTML);
    //底部自定义输出HTML代码
    $FooterHTML = new Typecho_Widget_Helper_Form_Element_Textarea('FooterHTML', NULL, _t(''), _t('自定义输出body 尾部的HTML代码'), _t('这里填写的是html代码，这里填写的是html代码，会输入到<\/body>之前'));
    $form->addInput($FooterHTML);
    //博客底部左侧信息
    $LeftHTML = new Typecho_Widget_Helper_Form_Element_Textarea('LeftHTML', NULL, _t(''), _t('博客底部左侧信息'), _t('这里面填写的是 html代码，位置是博客底部的右边。'));
    $form->addInput($LeftHTML);
    //博客底部右侧信息
    $RightHTML = new Typecho_Widget_Helper_Form_Element_Textarea('RightHTML', NULL, _t(''), _t('博客底部右侧信息'), _t('这里面填写的是 html代码，位置是博客底部的右边。'));
    $form->addInput($RightHTML);

    $form->addItem(new Typecho_Widget_Helper_Layout("h3> Pjax设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 设置主题的Pjax功能 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));

    $PjaxOption = new Typecho_Widget_Helper_Form_Element_Select('PjaxOption', array(
        'jQueryPjax' => _t('jQuery版 Pjax'),
        'MoOxPjax' => _t('MoOx版 Pjax（强烈推荐！）')
    ),'MoOxPjax', _t('主题使用的Pjax版本'), NULL);
    $form->addInput($PjaxOption);
    //Pjax重载
    $PjaxReLoad = new Typecho_Widget_Helper_Form_Element_Textarea('PjaxReLoad', NULL, _t(''), _t('Pjax重载函数'), _t('这里面填写的是代码，用于重载Pjax函数'));
    $form->addInput($PjaxReLoad);

    $form->addItem(new Typecho_Widget_Helper_Layout("h3> 更多外观设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 主题的元素动画、颜色设置 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));
    
    $IndexAction = new Typecho_Widget_Helper_Form_Element_Text('IndexAction', NULL, _t('fade-larger-small 1s'), _t('首页文章卡片动画'), _t('默认值：fade-larger-small 1s'));
    $form->addInput($IndexAction);
    $LinksAction = new Typecho_Widget_Helper_Form_Element_Text('LinksAction', NULL, _t('fade-in-top 1s'), _t('文章归档页, 友链页链接动画'), _t('默认值：fade-in-top 1s'));
    $form->addInput($LinksAction);


    $form->addItem(new Typecho_Widget_Helper_Layout("h3> IMouse设置 </h3"));
    $form->addItem(new Typecho_Widget_Helper_Layout("small> 主题的鼠标样式设置 </small"));
    $form->addItem(new Typecho_Widget_Helper_Layout("hr> </hr"));

    $IMouseDefaultBackgroundColor = new Typecho_Widget_Helper_Form_Element_Text('IMouseDefaultBackgroundColor', NULL, _t('\'rgba(1, 80, 111, .1)\''), _t('非 hover 默认状态下的光标背景颜色，CSS 格式'), _t('默认值：\'rgba(1, 80, 111, .1)\''));
    $form->addInput($IMouseDefaultBackgroundColor);
    $IMouseActiveBackgroundColor = new Typecho_Widget_Helper_Form_Element_Text('IMouseActiveBackgroundColor', NULL, _t('\'rgba(1, 80, 111, .15)\''), _t('非 hover 按下状态下的光标背景颜色，CSS 格式'), _t('默认值：\'rgba(1, 80, 111, .15)\''));
    $form->addInput($IMouseActiveBackgroundColor);
    $IMouseDefaultSize = new Typecho_Widget_Helper_Form_Element_Text('IMouseDefaultSize', NULL, _t('20'), _t('非 hover 默认状态下的光标直径'), _t('默认值：20'));
    $form->addInput($IMouseDefaultSize);
    $IMouseActiveSize = new Typecho_Widget_Helper_Form_Element_Text('IMouseActiveSize', NULL, _t('15'), _t('非 hover 按下状态下的光标直径'), _t('默认值：15'));
    $form->addInput($IMouseActiveSize);
    $IMouseHoverPadding = new Typecho_Widget_Helper_Form_Element_Text('IMouseHoverPadding', NULL, _t('8'), _t('hover 状态下的光标 padding 大小'), _t('默认值：8'));
    $form->addInput($IMouseHoverPadding);
    $IMouseActivePadding = new Typecho_Widget_Helper_Form_Element_Text('IMouseActivePadding', NULL, _t('4'), _t('hover 按下状态下的光标 padding 大小'), _t('默认值：4'));
    $form->addInput($IMouseActivePadding);
    $IMouseHoverRadius = new Typecho_Widget_Helper_Form_Element_Text('IMouseHoverRadius', NULL, _t('8'), _t('hover 状态下的光标圆角半径'), _t('默认值：8'));
    $form->addInput($IMouseHoverRadius);
    $IMouseActiveRadius = new Typecho_Widget_Helper_Form_Element_Text('IMouseActiveRadius', NULL, _t('4'), _t('hover 按下状态下的光标圆角半径
    '), _t('默认值：4'));
    $form->addInput($IMouseActiveRadius);
    $IMouseSelectionWidth = new Typecho_Widget_Helper_Form_Element_Text('IMouseSelectionWidth', NULL, _t('3'), _t('文字选择状态下的光标宽度'), _t('默认值：3'));
    $form->addInput($IMouseSelectionWidth);
    $IMouseSelectionHeight = new Typecho_Widget_Helper_Form_Element_Text('IMouseSelectionHeight', NULL, _t('40'), _t('文字选择状态下的光标高度'), _t('默认值：40'));
    $form->addInput($IMouseSelectionHeight);
    $IMouseSelectionRadius = new Typecho_Widget_Helper_Form_Element_Text('IMouseSelectionRadius', NULL, _t('2'), _t('文字选择状态下的光标圆角半径'), _t('默认值：2'));
    $form->addInput($IMouseSelectionRadius);
    /*
    Example:
    $name = new Typecho_Widget_Helper_Form_Element_Text('name', NULL, _t(''), _t('Title'), _t('Description'));
    $form->addInput($name);
    */
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
