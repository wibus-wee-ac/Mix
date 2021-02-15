/**
 * warning_notice.js
 * @author Wibus
 * @date 2021-1-17
 * 使用一些警告提醒
 */
$(".protected").submit(function() {
    var surl=$(".protected").attr("action");//表单地址
    $.ajax({
                    type: "POST",
                    url:surl,
                    data:$('.protected').serialize(),// 你的form
                    async:true,
                    error: function(request) {
    alert("密码提交失败，请刷新页面重试！");//ajax提交失败报错
                    },
                    success: function(data) {
    
    if(data.indexOf("密码错误") >= 0 && data.indexOf("<title>Error</title>") >= 0) {
    alert("密码错误，请重试！");//密码错误弹窗提醒
    }else{
    location.reload();//密码正确刷新页面
    }
    }
    });
    return false;
    });
