/*
 * @Name: friends.js
 * 用于检测友链状态
 * @author: Wibus
 * @Date: 2021-04-03 10:39:02
 * @LastEditors: Wibus
 * @LastEditTime: 2021-04-03 10:44:23
 */
function getURL(url){
    $.ajax({
        url: 'https://bird.ioliu.cn/v2/?url='+url,
        type: 'GET',
        complete: function(response) {
            if(response.status == 200) {
                alert('有效');
            } else {
                alert('无效');
            }
        }
    });
}