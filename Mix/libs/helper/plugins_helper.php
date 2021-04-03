



<?php
/**
 * CodePretty代码美化Beautiful
 * Author: Wibus
 * 参照项目：CodePretty
 */

Typecho_Plugin::factory('Widget_Archive')->header = array('CodePretty', 'header');
Typecho_Plugin::factory('Widget_Archive')->footer = array('CodePretty', 'footer');
class CodePretty{
     /**
     *为header添加css文件
     *@return void
     */
    public static function header() {
        $cssUrl = $GLOBALS['assetURL'].'code_pretty/styles/Mac.css';
        // 自带CSS列表：
        // 1. mix.css -- 白色无边框
        // 2. WhiteMac.css -- 白色Mac代码高亮
        // 3. BlackMac.css -- 黑色Mac代码高亮
        // 4. coy.css -- mix.css的备份
        // 5. Mac.css -- 白色（日间）黑色（夜间）Mac代码高亮（默认，推荐！）
        echo '<link rel="stylesheet" type="text/css" href="' . $cssUrl . '" />';
    }

    
    /**
     *为footer添加js文件
     *@return void
     */
    public static function footer() {
        $jsUrl = $GLOBALS['assetURL'].'code_pretty/prism.js';
        $jsUrl_clipboard = $GLOBALS['assetURL'].'code_pretty/clipboard.min.js';

            echo <<<HTML
<script type="text/javascript">
	(function(){
		var pres = document.querySelectorAll('pre');
		var lineNumberClassName = 'line-numbers';
		pres.forEach(function (item, index) {
			item.className = item.className == '' ? lineNumberClassName : item.className + ' ' + lineNumberClassName;
		});
	})();
</script>

HTML;
        echo <<<HTML
<script type="text/javascript" src="{$jsUrl_clipboard}"></script>
<script type="text/javascript" src="{$jsUrl}"></script>

HTML;
    }
}

?>
<?php

/**
 * 后台代码按钮
 * 准备废弃，原作者写的太废了qwq
 * 参照项目：Joe
 */

Typecho_Plugin::factory('admin/write-post.php')->bottom = array('editor', 'reset');
Typecho_Plugin::factory('admin/write-page.php')->bottom = array('editor', 'reset');
class editor
{
    public static function reset()
    {
        Typecho_Widget::widget('Widget_Options')->to($options);
?>

        <style>
            .wmd-button.custom {
                width: 20px;
                height: 20px;
                line-height: 20px;
                text-align: center;
            }

            .wmd-button.custom svg {
                width: 15px;
                height: 15px;
                vertical-align: middle;
            }

            body.fullscreen {
                overflow-x: hidden;
            }

            .wmd-button-row {
                height: auto;
            }

            #custom-field .typecho-list-table tbody textarea {
                width: 100%;
                height: 100px;
            }

            #custom-field .typecho-list-table tbody input[type="text"] {
                width: 100%;
            }
        </style>
        <script>
            $(function() {
                $("#wmd-button-bar .wmd-edittab").remove()
                $("#wmd-button-row .wmd-spacer").remove()
                $("#wmd-button-row #wmd-more-button").remove()
                $("#wmd-button-row #wmd-code-button").remove()
                $("#wmd-button-row #wmd-heading-button").remove()
                $("#wmd-fullscreen-button").on("click", function() {
                    $(".fullscreen #text").css("top", $('.fullscreen #wmd-button-bar').outerHeight())
                })
                $("#wmd-button-row #wmd-fullscreen-button").before(`
                    <li class="wmd-button custom" id="j-wmd-scode" title="代码框">
                        <svg t="1607494486968" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="40194" width="15" height="15"><path d="M777.728 287.232l-636.416 0.512c-51.712 0-72.704 20.992-72.704 72.704v303.104c0 51.712 21.504 72.704 72.704 72.704l636.928 0.512 177.664-224.768-178.176-224.768z" p-id="40195" fill="#888888"></path></svg>
                    </li>
                    <li class="wmd-button custom" id="j-wmd-linecode" title="行内代码">
                        <svg t="1607495229023" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1161" width="15" height="15"><path d="M810.666667 213.333333a85.333333 85.333333 0 0 1 85.333333 85.333334v426.666666a85.333333 85.333333 0 0 1-85.333333 85.333334H213.333333a85.333333 85.333333 0 0 1-85.333333-85.333334V298.666667a85.333333 85.333333 0 0 1 85.333333-85.333334h597.333334z m0 42.666667H213.333333a42.666667 42.666667 0 0 0-42.666666 42.666667v426.666666a42.666667 42.666667 0 0 0 42.666666 42.666667h597.333334a42.666667 42.666667 0 0 0 42.666666-42.666667V298.666667a42.666667 42.666667 0 0 0-42.666666-42.666667z" p-id="1162" fill="#888888"></path><path d="M593.194667 330.965333L774.229333 512l-181.034666 181.034667-53.546667-53.546667 128.554667-128.554667-127.445334-127.488 52.48-52.48z m-170.666667 0l52.48 52.48-127.445333 127.488 128.554666 128.554667-53.589333 53.546667L241.536 512l180.992-181.034667z" p-id="1163" fill="#888888"></path></svg>
                    </li>
                    <li class="wmd-button custom" id="j-wmd-code" title="代码块">
                        <svg t="1607495398743" class="icon" viewBox="0 0 1170 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1936" width="15" height="15"><path d="M1144.876703 504.481774l-279.739458-253.118501a40.15084 40.15084 0 0 0-59.458348 5.631356 47.976231 47.976231 0 0 0 5.19255 64.065821l250.485658 226.716947-251.436407 227.521426a47.537424 47.537424 0 0 0-5.119415 63.480745 39.712033 39.712033 0 0 0 58.873272 5.485087l291.587247-263.796137a47.537424 47.537424 0 0 0 5.119415-63.480745 42.052337 42.052337 0 0 0-15.431379-12.505999zM108.926526 547.777397l250.485659-226.716947a47.976231 47.976231 0 0 0 5.192549-64.065821 40.15084 40.15084 0 0 0-59.458347-5.631356L25.333794 504.481774a44.685179 44.685179 0 0 0-24.86573 34.812021 46.952348 46.952348 0 0 0 14.6269 41.101588l291.587247 263.942407a39.712033 39.712033 0 0 0 58.873272-5.558222 47.537424 47.537424 0 0 0-5.19255-63.480745L108.853392 547.631128zM667.089022 0.804479a44.904582 44.904582 0 0 1 33.934407 52.218033L548.611133 984.975431a44.53891 44.53891 0 0 1-26.620957 36.128443 39.492629 39.492629 0 0 1-42.125471-8.044795 47.171752 47.171752 0 0 1-13.529883-43.880699L618.893387 37.298594a42.198606 42.198606 0 0 1 48.415038-36.567249z" p-id="1937" fill="#888888"></path></svg>
                    </li>
                    <li class="wmd-button custom" id="j-wmd-delete" title="删除线">
                        <svg t="1607494660243" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1750" width="15" height="15"><path d="M968 542.9V481c0-1.7-0.5-3-2.3-3H571.6l-0.5-0.1c-10.7-2.1-21.6-4.2-32.5-6.2-16.9-3.1-23.2-4.3-31.8-6-53.1-10.4-85.4-20.7-111.6-35.8-37.9-22.1-56.3-52.2-56.3-92 0-39.7 16.4-72.8 47.3-95.7 30.1-22.3 72.8-34 123.3-34 57.8 0 102.6 15.3 133.1 45.5 15.6 15.4 27.1 34.3 34 56.2 1.6 4.9 3.1 11.4 4.6 18.8 0.5 2.5 2.7 4.3 5.3 4.3h75c2.9 0 5.4-2.3 5.4-5.2v-0.8c-1-6.8-1.3-12.1-2-15.9-7.3-43.8-28-82-59.9-110.8-44.7-40.8-110.8-62.4-191-62.4-73.4 0-139.4 18.3-185.9 51.5-25.8 18.6-45.6 41.4-58.8 67.9-13.4 27.2-20.3 58.7-20.3 93.5 0 29.5 5.6 54.5 17.2 76.5 8.2 15.5 19.3 29.2 34 41.9l10.2 8.8H59.2c-1.8 0-4.2 1.4-4.2 3.1V543c0 1.8 2.4 3 4.2 3h446.7l0.5 0.2c1.3 0.3 2.6 0.6 3.8 0.8 0.8 0.2 1.5 0.3 2.3 0.5 33 6.6 51.7 10.9 69 15.8 24.3 6.9 42.8 14.1 58 22.6 38.7 21.8 57.5 53.2 57.5 96 0 37.9-16.6 71.8-46.8 95.4-32.2 25.2-79.7 38.6-137.5 38.6-45.6 0-84.6-8.9-116-26.4-30.9-17.3-52.4-42.3-63.8-74.3-0.9-2.4-1.8-5.8-2.9-9.9-0.6-2.3-2.8-4.3-5.2-4.3h-82.1c-3 0-5.7 3-5.7 6v0.8c0 2.2 0.5 4.1 0.7 5.4 6.5 48.9 30.4 89 70.9 119 47.6 35.2 115 53.8 194.6 53.8 85.6 0 157.4-20.1 207.3-58 25-18.9 44.3-42.2 57.3-69.3 13.1-27.4 19.8-58.4 19.8-92.1 0-32-5.8-58.6-17.8-81.5-5.7-11.1-13-21.4-21.7-30.7l-7.9-8.5h225.3c2 0.1 2.5-1.3 2.5-3z" p-id="1751" fill="#888888"></path></svg>
                    </li>
                    <li class="wmd-button custom" id="j-wmd-table" title="插入表格">
                        <svg t="1607495516074" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2817" width="15" height="15"><path d="M960 591.424V368.96c0-0.288 0.16-0.512 0.16-0.768s-0.16-0.512-0.16-0.768V192a32 32 0 0 0-32-32H96a32 32 0 0 0-32 32v175.424c0 0.288-0.16 0.512-0.16 0.768s0.16 0.48 0.16 0.768v222.464c0 0.288-0.16 0.512-0.16 0.768s0.16 0.48 0.16 0.768V864a32 32 0 0 0 32 32h832a32 32 0 0 0 32-32V592.96c0-0.288 0.16-0.512 0.16-0.768s-0.16-0.512-0.16-0.768z m-560-31.232v-160h208v160H400z m208 64V832H400V624.192h208z m-480-224h208v160H128v-160z m544 0h224v160H672v-160zM896 224v112.192H128V224h768zM128 624.192h208V832H128V624.192zM672 832V624.192h224V832H672z" p-id="2818" fill="#888888"></path></svg>
                    </li>
                    <li class="wmd-button custom" id="j-wmd-title" title="插入标题">
                        <svg t="1607495979397" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4871" width="15" height="15"><path d="M237.909333 567.068444v389.12c0 44.487111-20.764444 66.787556-62.065777 66.787556C134.371556 1022.976 113.777778 1000.675556 113.777778 956.302222V77.767111C113.777778 25.941333 134.371556 0 175.786667 0c41.358222 0 62.122667 25.941333 62.122666 77.767111V461.368889h541.866667V77.767111c0-48.071111 22.641778-74.126222 67.811556-77.767111 41.358222 0 62.065778 25.941333 62.065777 77.767111v878.364445c0 44.430222-20.707556 66.730667-62.008889 66.730666-45.226667 0-67.868444-22.300444-67.868444-66.730666v-389.12H237.909333z" p-id="4872" fill="#888888"></path></svg>
                    </li>
                    <li class="wmd-button custom" id="j-wmd-footer" title="插入脚注">
                        <svg t="1607496225463" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6607" width="15" height="15"><path d="M830.42178027 223.13075733c-25.66834027 0-46.47065387-20.78485013-46.47065387-46.43681706 0-25.63777707 20.80340587-46.4226272 46.47065387-46.4226272 25.65196693 0 46.456464 20.78485013 46.456464 46.4226272C876.87715307 202.3469984 856.0737472 223.13075733 830.42178027 223.13075733zM711.24235627 155.84250773c-24.5451584 0-44.45242133-19.8897984-44.45242134-44.41967573 0-24.52987733 19.90617067-44.42076693 44.45242134-44.42076693 24.542976 0 44.436048 19.8908896 44.436048 44.42076693C755.67840427 135.95161813 735.7853312 155.84250773 711.24235627 155.84250773zM583.97253547 135.64271573c-27.15063253 0-49.15908373-21.98989547-49.15908374-49.12306346 0-27.11897813 22.0084512-49.12415467 49.15908374-49.12415467 27.14954133 0 49.15471787 22.00517653 49.15471786 49.12415467C633.1283456 113.65282027 611.12207787 135.64271573 583.97253547 135.64271573zM453.33098987 149.10342187c-30.86073173 0-55.8785216-25.00032533-55.8785216-55.8468672 0-30.84435947 25.01778987-55.86214933 55.8785216-55.86214934 30.87928747 0 55.89598613 25.01669867 55.89598613 55.86214934C509.22697707 124.10309653 484.2102784 149.10342187 453.33098987 149.10342187zM260.1231392 255.42575467c-55.04896213 0-99.66402027-44.5834048-99.66402027-99.58324694 0-55.01621547 44.6150592-99.59962027 99.66402027-99.59962026 55.0325888 0 99.6498304 44.58231253 99.6498304 99.59962026C359.7718784 210.84234987 315.1546368 255.42575467 260.1231392 255.42575467zM585.30201493 986.09585173c-24.2537216 0-48.08611307-6.22825067-68.92117333-18.01346346-39.6988224-22.45379413-66.20327253-52.48496533-78.77874987-89.2563136-11.796128-34.49660693-11.29075093-75.288048 1.50303254-121.23804374 1.97457173-7.07418347 3.09666133-13.2598656 3.43503466-18.92488853 0.98674027-16.30522453 1.48010987-29.8794496 1.5073984-41.51948907 0.0764064-23.9862976-8.5542944-47.91801813-24.30502293-67.40285973-31.00481387-38.34314667-56.70808213-76.8587552-76.39267307-114.47385387-23.04867627-44.02454293-26.55793387-95.91353493-9.6239904-142.35690026 20.97695893-57.5463744 48.99208-100.01003413 85.64554454-129.81635094 42.12201173-34.2531968 96.7496448-51.7274464 162.36458346-51.93701973l0.38203414 0c7.02834027 0 14.0719616 0.55886187 20.93220586 1.66021227 57.03772267 9.03456533 102.65152853 28.52377387 139.40868694 59.57333973 32.06577707 27.0873248 56.58146453 62.47352533 74.9464 108.18120213 13.57968213 33.8056704 20.9485792 70.70800213 21.90475626 109.68096 3.69700053 150.69616427-12.2785824 265.21367893-48.83817493 350.09624534-17.24393707 40.038288-39.47615147 73.65621547-66.0788384 99.92380373-25.28957973 24.9708544-55.3098368 44.07911893-89.22466027 56.79431253C619.195008 983.05704107 602.4160608 986.09585173 585.30201493 986.09585173zM582.118032 229.359008l-0.26524053 0c-107.4138592 0.341648-172.87052693 48.65043307-212.23315947 156.63516053-13.2598656 36.36857493-10.49830293 77.02794133 7.57846933 111.55511147 18.51993173 35.38947627 42.82822933 71.78315627 72.25360427 108.1713792 21.25748053 26.2970592 32.9051616 58.80162987 32.8003744 91.52887253-0.02947093 12.37136213-0.5457632 26.672544-1.57725547 43.70581654-0.49991893 8.3851072-2.06080213 17.1860864-4.76888 26.88975786-21.89929813 78.6575904-3.06282347 131.7221568 59.28408534 166.98392427 15.10891093 8.54665387 32.43798827 13.06339093 50.1119872 13.06339093 12.51544427 0 24.7787456-2.22016533 36.45153066-6.5982784 60.21079147-22.57386133 103.92097387-67.07758507 133.63232854-136.05988373 33.85588053-78.6041056 49.24204053-190.99423467 45.73169066-334.0464384-0.84265813-34.39618667-7.29030613-66.82107627-19.1628416-96.3763424-33.65940587-83.77466773-92.4195584-129.61769387-184.92207253-144.26925547C592.19828053 229.7661472 587.05500693 229.359008 582.118032 229.359008z" p-id="6608" fill="#888888"></path></svg>
                    </li>
                    <li class="wmd-button custom" id="j-wmd-html" title="原生代码">
                        <svg t="1607496478319" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7487" data-spm-anchor-id="a313x.7781069.0.i37" width="15" height="15"><path d="M868.8 105.6 155.2 105.6c-28.8 0-51.2 25.6-48 54.4l75.2 600c1.6 17.6 12.8 32 28.8 38.4l281.6 118.4c11.2 4.8 25.6 4.8 36.8 0l281.6-118.4c16-6.4 27.2-20.8 28.8-38.4l75.2-600C920 129.6 897.6 105.6 868.8 105.6zM865.6 179.2l-70.4 558.4c-1.6 8-6.4 16-14.4 19.2l-259.2 108.8c-6.4 3.2-12.8 3.2-19.2 0l-259.2-108.8c-8-3.2-12.8-11.2-14.4-19.2L158.4 179.2c-1.6-14.4 9.6-27.2 24-27.2l659.2 0C856 153.6 867.2 166.4 865.6 179.2z" p-id="7488" fill="#888888"></path><path d="M716.8 252.8 331.2 252.8c-28.8 0-51.2 25.6-48 54.4l17.6 136c3.2 24 24 41.6 48 41.6l294.4 0c14.4 0 25.6 12.8 24 27.2l-9.6 80c-1.6 8-6.4 16-14.4 19.2l-120 51.2c-6.4 3.2-12.8 3.2-19.2 0l-120-51.2c-8-3.2-12.8-11.2-14.4-19.2l-3.2-28.8c-1.6-12.8-14.4-22.4-27.2-20.8-12.8 1.6-22.4 14.4-20.8 27.2l4.8 41.6c1.6 17.6 12.8 32 28.8 38.4l142.4 60.8c11.2 4.8 25.6 4.8 36.8 0l142.4-60.8c16-6.4 27.2-20.8 28.8-38.4l14.4-121.6c3.2-28.8-19.2-54.4-48-54.4l-300.8 0c-12.8 0-22.4-9.6-24-20.8l-11.2-88c-1.6-14.4 9.6-27.2 24-27.2l358.4 0c11.2 0 20.8-8 24-19.2l0 0C742.4 267.2 731.2 252.8 716.8 252.8z" p-id="7489" fill="#888888"></path></svg>
                    </li>
                `)
                $("#j-wmd-scode").on("click", function(){
                    insertAtCursor('[scode type="类型"]文字[/scode]');
                })
                $("#j-wmd-linecode").on("click", function() {
                    insertAtCursor(' `行内代码` ');
                })
                $("#j-wmd-code").on("click", function() {
                    insertAtCursor('\n```html\n<div>可以将html换成你需要使用的语法（您需要先在外观设置里开启代码高亮才会显示）</div>\n```\n');
                })
                $("#j-wmd-delete").on("click", function() {
                    insertAtCursor(' ~~ 删除线效果 ~~ ');
                })
                $("#j-wmd-table").on("click", function() {
                    insertAtCursor('\n表头|表头|表头\n---|:--:|---:\n居左|居中|居右\n居左|居中|居右\n');
                })
                $("#j-wmd-title").on("click", function() {
                    insertAtCursor('\n# 一级标题\n## 二级标题\n### 三级标题\n#### 四级标题\n##### 五级标题\n###### 六级标题\n');
                })
                $("#j-wmd-footer").on("click", function() {
                    insertAtCursor('\n使用 Markdown[^1]可以效率的书写文档, 直接转换成 HTML[^2],。\n\n[^1]:Markdown是一种纯文本标记语言\n\n[^2]:HyperText Markup Language 超文本标记语言\n');
                })
                $("#j-wmd-html").on("click", function() {
                    insertAtCursor('\n!!!\n这里写原生html代码\n!!!\n');
                })

                function insertAtCursor(myValue, myField = $('#text')[0]) {
                    if (document.selection) {
                        myField.focus();
                        sel = document.selection.createRange();
                        sel.text = myValue;
                        sel.select();
                    } else if (myField.selectionStart || myField.selectionStart == '0') {
                        var startPos = myField.selectionStart;
                        var endPos = myField.selectionEnd;
                        var restoreTop = myField.scrollTop;
                        myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
                        if (restoreTop > 0) {
                            myField.scrollTop = restoreTop;
                        }
                        myField.focus();
                        myField.selectionStart = startPos + myValue.length;
                        myField.selectionEnd = startPos + myValue.length;
                    } else {
                        myField.value += myValue;
                        myField.focus();
                    }
                }


                /* 粘贴上传 */
                // 上传URL
                var uploadUrl = '<?php Helper::security()->index('/action/upload'); ?>';
                // 处理有特定的 CID 的情况
                var cid = $('input[name="cid"]').val();
                if (cid) {
                    uploadUrl += '&cid=' + cid;
                }

                // 上传文件函数
                function uploadFile(file) {
                    // 生成一段随机的字符串作为 key
                    var index = Math.random().toString(10).substr(2, 5) + '-' + Math.random().toString(36).substr(2);
                    // 默认文件后缀是 png，在Chrome浏览器中剪贴板粘贴的图片都是png格式，其他浏览器暂未测试
                    var fileName = index + '.png';

                    // 上传时候提示的文字
                    var uploadingText = '[图片上传中...(' + index + ')]';

                    // 先把这段文字插入
                    var textarea = $('#text'),
                        sel = textarea.getSelection(),
                        offset = (sel ? sel.start : 0) + uploadingText.length;
                    textarea.replaceSelection(uploadingText);
                    // 设置光标位置
                    textarea.setSelection(offset, offset);

                    // 设置附件栏信息
                    // 先切到附件栏
                    $('#tab-files-btn').click();

                    // 更新附件的上传提示
                    var fileInfo = {
                        id: index,
                        name: fileName
                    }
                    fileUploadStart(fileInfo);

                    // 是时候展示真正的上传了
                    var formData = new FormData();
                    formData.append('name', fileName);
                    formData.append('file', file, fileName);

                    $.ajax({
                        method: 'post',
                        url: uploadUrl,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            var url = data[0],
                                title = data[1].title;
                            textarea.val(textarea.val().replace(uploadingText, '![' + title + '](' + url + ')'));
                            // 触发输入框更新事件，把状态压人栈中，解决预览不更新的问题
                            textarea.trigger('paste');
                            // 附件上传的UI更新
                            fileUploadComplete(index, url, data[1]);
                        },
                        error: function(error) {
                            textarea.val(textarea.val().replace(uploadingText, '[图片上传错误...]\n'));
                            // 触发输入框更新事件，把状态压人栈中，解决预览不更新的问题
                            textarea.trigger('paste');
                            // 附件上传的 UI 更新
                            fileUploadError(fileInfo);
                        }
                    });
                }

                // 监听输入框粘贴事件
                document.getElementById('text').addEventListener('paste', function(e) {
                    var clipboardData = e.clipboardData;
                    var items = clipboardData.items;
                    for (var i = 0; i < items.length; i++) {
                        if (items[i].kind === 'file' && items[i].type.match(/^image/)) {
                            // 取消默认的粘贴操作
                            e.preventDefault();
                            // 上传文件
                            uploadFile(items[i].getAsFile());
                            break;
                        }
                    }
                });

                // 更新附件数量显示
                function updateAttacmentNumber() {
                    var btn = $('#tab-files-btn'),
                        balloon = $('.balloon', btn),
                        count = $('#file-list li .insert').length;

                    if (count > 0) {
                        if (!balloon.length) {
                            btn.html($.trim(btn.html()) + ' ');
                            balloon = $('<span class="balloon"></span>').appendTo(btn);
                        }

                        balloon.html(count);
                    } else if (0 == count && balloon.length > 0) {
                        balloon.remove();
                    }
                }

                // 开始上传文件的提示
                function fileUploadStart(file) {
                    $('<li id="' + file.id + '" class="loading">' +
                        file.name + '</li>').appendTo('#file-list');
                }

                // 上传完毕的操作
                var completeFile = null;

                function fileUploadComplete(id, url, data) {
                    var li = $('#' + id).removeClass('loading').data('cid', data.cid)
                        .data('url', data.url)
                        .data('image', data.isImage)
                        .html('<input type="hidden" name="attachment[]" value="' + data.cid + '" />' +
                            '<a class="insert" target="_blank" href="###" title="<?php _e('点击插入文件'); ?>">' + data.title + '</a><div class="info">' + data.bytes +
                            ' <a class="file" target="_blank" href="<?php $options->adminUrl('media.php'); ?>?cid=' +
                            data.cid + '" title="<?php _e('编辑'); ?>"><i class="i-edit"></i></a>' +
                            ' <a class="delete" href="###" title="<?php _e('删除'); ?>"><i class="i-delete"></i></a></div>')
                        .effect('highlight', 1000);

                    attachInsertEvent(li);
                    attachDeleteEvent(li);
                    updateAttacmentNumber();

                    if (!completeFile) {
                        completeFile = data;
                    }
                }

                // 增加插入事件
                function attachInsertEvent(el) {
                    $('.insert', el).click(function() {
                        var t = $(this),
                            p = t.parents('li');
                        Typecho.insertFileToEditor(t.text(), p.data('url'), p.data('image'));
                        return false;
                    });
                }

                // 增加删除事件
                function attachDeleteEvent(el) {
                    var file = $('a.insert', el).text();
                    $('.delete', el).click(function() {
                        if (confirm('<?php _e('确认要删除文件 %s 吗?'); ?>'.replace('%s', file))) {
                            var cid = $(this).parents('li').data('cid');
                            $.post('<?php Helper::security()->index('/action/contents-attachment-edit'); ?>', {
                                    'do': 'delete',
                                    'cid': cid
                                },
                                function() {
                                    $(el).fadeOut(function() {
                                        $(this).remove();
                                        updateAttacmentNumber();
                                    });
                                });
                        }

                        return false;
                    });
                }

                // 错误处理，相比原来的函数，做了一些微小的改造
                function fileUploadError(file) {
                    var word;

                    word = '<?php _e('上传出现错误'); ?>';

                    var fileError = '<?php _e('%s 上传失败'); ?>'.replace('%s', file.name),
                        li, exist = $('#' + file.id);

                    if (exist.length > 0) {
                        li = exist.removeClass('loading').html(fileError);
                    } else {
                        li = $('<li>' + fileError + '<br />' + word + '</li>').appendTo('#file-list');
                    }

                    li.effect('highlight', {
                        color: '#FBC2C4'
                    }, 2000, function() {
                        $(this).remove();
                    });
                }
            })
        </script>
<?php }
} ?>