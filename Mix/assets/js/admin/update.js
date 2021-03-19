var wxfversion = "1.0.0";
function update_detec() {
    var container = document.getElementById("wxfans");
    if (!container) {
        return
    }
    var ajax = new XMLHttpRequest();
    container.style.display = "block";
    ajax.open("get", "https://api.github.com/repos/wibus-wee/Mix/releases/latest");
    ajax.send();
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            var obj = JSON.parse(ajax.responseText);
            var newest = obj.tag_name;
            if (newest > wxfversion) {
                container.innerHTML = "发现新主题版本：" + obj.name + '。下载地址：<a href="' + obj.zipball_url + '">点击下载</a>' + "<br>您目前的版本:" + String(wxfversion) + "。" + '<a target="_blank" href="' + obj.html_url + '">查看新版亮点</a>'
            } else {
                container.innerHTML = "您目前的版本:" + String(wxfversion) + "。" + "您目前使用的是最新版主题。"
            }
        }
    }
};
update_detec();