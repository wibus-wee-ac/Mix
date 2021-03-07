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
//2.0右侧展开菜单
document.getElementById("btn_sidebar").onclick = function(){
    if(document.getElementById("headerr").className == 'Header_drawer__iQn1p global-drawer'){
        document.getElementById('headerr').className = 'Header_drawer__iQn1p global-drawer Header_show__3R4Sq global-show';
    }
}
document.getElementById("close").onclick = function(){
    if(document.getElementById("headerr").className == 'Header_drawer__iQn1p global-drawer Header_show__3R4Sq global-show'){
        document.getElementById('headerr').className = 'Header_drawer__iQn1p global-drawer';
    }
}
document.getElementById("headerr").onclick = function(){
    if(document.getElementById("headerr").className == 'Header_drawer__iQn1p global-drawer Header_show__3R4Sq global-show'){
        document.getElementById('headerr').className = 'Header_drawer__iQn1p global-drawer';
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

// if (NowTime >= 7 == true) {
//     setLightStyle()
//     console.log('早上好撒')
// }
// if (NowTime > 21 == true) {
//     setDarkStyle()
//     console.log('晚上好撒')
// }

/*
 * Pjax jQuery版本 激活菜单栏

 $("#btn_active").click(function(){
    name1 = document.getElementById("header").className;
       if(name1 == 'assets'){
        $('#header').addClass('active');    
    }else{
        $('#header').removeClass('active');        
    }
});
$("#Header_head-menu__ofiV5").click(function(){
    name1 = document.getElementById("header").className;
       if(name1 != 'assets'){
        $('#header').remoteClass('active');    
    }
});
*/

