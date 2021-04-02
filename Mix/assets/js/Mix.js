/**
 * FontZoom 函数
 * 函数变量：size
 * 调用方法：FontZoom(size)
 * 函数用途：用于调整文章文字大小
 */
function FontZoom(size){
    var text=document.getElementById("write");
    text.style.fontSize=size +"px";
}

/**
 * 用于激活menu菜单栏
 * btn_active 为按钮，双向激活
 * Header_head-menu__ofiV5 为 菜单 单
 */

// 原生js编写技术
//1.0下拉菜单
if(window.MIX_CONFIG.SIDEBAR == 1){
    document.getElementById("btn_active").onclick = function(){
        name1 = document.getElementById("header").className;
        if(name1 == 'assets'){
            document.getElementById('header').className = 'assets active';
        }else{
            document.getElementById('header').className = 'assets';
        }
    }
    document.getElementById("Header_head-menu__ofiV5").onclick = function(){
        name1 = document.getElementById("header").className;
        if(name1 != 'assets'){
            document.getElementById('header').className = 'assets';
        }
    }
}else if(window.MIX_CONFIG.SIDEBAR == 2){
//2.0右侧展开菜单
    document.getElementById("btn_sidebar").onclick = function(){
        if(document.getElementById("headerr").className == 'Header_drawer__iQn1p global-drawer'){
            document.getElementById('headerr').className = 'Header_drawer__iQn1p global-drawer Header_show__3R4Sq global-show';
            document.getElementById("overlay").className = 'display_yes';
        }
    }
    document.getElementById("close").onclick = function(){
        if(document.getElementById("headerr").className == 'Header_drawer__iQn1p global-drawer Header_show__3R4Sq global-show'){
            document.getElementById('headerr').className = 'Header_drawer__iQn1p global-drawer';
            document.getElementById("overlay").className = 'display_yes display_none';
        }
    }
    document.getElementById("headerr").onclick = function(){
        if(document.getElementById("headerr").className == 'Header_drawer__iQn1p global-drawer Header_show__3R4Sq global-show'){
            document.getElementById('headerr').className = 'Header_drawer__iQn1p global-drawer';
            document.getElementById("overlay").className = 'display_yes display_none'
        }
    }
}
/**
 * 回到顶部 按钮
 * 绑定回到顶部动画
 */
var timer  = null;
document.getElementById('top').onclick = function(){
    cancelAnimationFrame(timer);
    timer = requestAnimationFrame(function fn(){
        var oTop = document.body.scrollTop || document.documentElement.scrollTop;
        if(oTop > 0){
            document.body.scrollTop = document.documentElement.scrollTop = oTop - 150;
            timer = requestAnimationFrame(fn);
        }else{
            cancelAnimationFrame(timer);
        }    
    });
}
/**
 * 夜晚模式 按钮
 * 绑定动画以及变化元素
 */
var Time = new Date();
var NowTime=Time.getHours();
function setDarkStyle($need){
    document.getElementById('html').className = 'dark'
    localStorage.setItem("html_style","dark");
    if ($need){
        ks.notice(
            "⭐️夜间模式",
            {
            color: "black",
            time: "1500",
            }
        )
    } 
}
function setLightStyle($need){
    document.getElementById('html').className = ''
    localStorage.setItem("html_style","light");
    if ($need){
        ks.notice(
            "🌤日间模式",
            {
            color: "blue",
            time: "1500",
            }
        )
    }
}
document.getElementById('dark_button').onclick = function(){
    if(document.getElementById('html').className != 'dark'){
        setDarkStyle("yes")
        console.log('小可爱调至夜间模式辽')
    }else{
        setLightStyle("yes")
        console.log('小可爱调至日间模式辽')
    }
}

if (localStorage.getItem("html_style") == 'dark') {
    setDarkStyle("yes")
    console.log('小可爱之前已经调至夜间模式辽～')
} else {
    setLightStyle("yes")
    console.log('小可爱之前已经调至日间模式辽～')
}

/**
 * 获取页面滚动条进度
 * @method getWebScrollProgress
 */
     var getWebScrollProgress = function () {
        var pageHeight = document.body.scrollHeight || document.documentElement.scrollHeight; // 页面总高度
        // var clientHeight = $(window).height() || document.documentElement.clientHeight; // 可见区域高度
        var clientHeight = document.documentElement.clientHeight;
        var scrollTop = document.body.scrollTop || document.documentElement.scrollTop; //滚动的高度位置
        var progress = Math.round(((scrollTop) / (pageHeight - clientHeight)) * 100); // 计算百分比
        // var progressId = document.getElementById('progress');
        document.getElementById('progress').style.width = progress + "%"
    }
    getWebScrollProgress(); //首次加载，渲染进度条
    window.onscroll = function() { //监听滚动事件
        getWebScrollProgress();
    }; 
