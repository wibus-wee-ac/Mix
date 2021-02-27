<?php

/*
 * libs.php
 * Author: Wibus
 * Here is Some Idea.
 */

class Content{
    /**
     * 输出文章摘要
     * @param $content
     * @param $limit 字数限制
     * @return string
     */
    public static function excerpt($content, $limit)
    {

        if ($limit == 0) {
            return "";
        } else {
            $content = self::returnExceptShortCodeContent($content);
            if (trim($content) == "") {
                return '暂时无可提供的摘要';
            } else {
                return Typecho_Common::subStr(strip_tags($content), 0, $limit, "...");
            }
        }
    }
    /**
     * 短代码模块
     * Author：Wibus
     * 参照项目：Wordpress handsome
     * Date：2020-12-27
     * 相关function：
     * get_shortcode_regex，shortcode_parse_atts，get_shortcode_atts_regex，get_markdown_regex，scodeParseCallback，parseContentPublic，postContent，postContentHtml
     */

    /**
     * 获取匹配短代码的正则表达式
     * Date: 2020-12-27
     * @param null $tagnames
     * @return string
     * @link https://github.com/WordPress/WordPress/blob/master/wp-includes/shortcodes.php#L254
     */
    public static function get_shortcode_regex($tagnames = null)
    {
        global $shortcode_tags;
        if (empty($tagnames)) {
            $tagnames = array_keys($shortcode_tags);
        }
        $tagregexp = join('|', array_map('preg_quote', $tagnames));
        // WARNING! Do not change this regex without changing do_shortcode_tag() and strip_shortcode_tag()
        // Also, see shortcode_unautop() and shortcode.js.
        // phpcs:disable Squiz.Strings.ConcatenationSpacing.PaddingFound -- don't remove regex indentation
        return
            '\\['                                // Opening bracket
            . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
            . "($tagregexp)"                     // 2: Shortcode name
            . '(?![\\w-])'                       // Not followed by word character or hyphen
            . '('                                // 3: Unroll the loop: Inside the opening shortcode tag
            . '[^\\]\\/]*'                   // Not a closing bracket or forward slash
            . '(?:'
            . '\\/(?!\\])'               // A forward slash not followed by a closing bracket
            . '[^\\]\\/]*'               // Not a closing bracket or forward slash
            . ')*?'
            . ')'
            . '(?:'
            . '(\\/)'                        // 4: Self closing tag ...
            . '\\]'                          // ... and closing bracket
            . '|'
            . '\\]'                          // Closing bracket
            . '(?:'
            . '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
            . '[^\\[]*+'             // Not an opening bracket
            . '(?:'
            . '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
            . '[^\\[]*+'         // Not an opening bracket
            . ')*+'
            . ')'
            . '\\[\\/\\2\\]'             // Closing shortcode tag
            . ')?'
            . ')'
            . '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]
        // phpcs:enable
    }
    /**
     * 获取短代码属性数组
     * Date: 2020-12-27
     * @param $text
     * @return array|string
     * @link https://github.com/WordPress/WordPress/blob/master/wp-includes/shortcodes.php#L508
     */
    public static function shortcode_parse_atts($text)
    {
        $atts = array();
        $pattern = self::get_shortcode_atts_regex();
        $text = preg_replace("/[\x{00a0}\x{200b}]+/u", ' ', $text);
        if (preg_match_all($pattern, $text, $match, PREG_SET_ORDER)) {
            foreach ($match as $m) {
                if (!empty($m[1])) {
                    $atts[strtolower($m[1])] = stripcslashes($m[2]);
                } elseif (!empty($m[3])) {
                    $atts[strtolower($m[3])] = stripcslashes($m[4]);
                } elseif (!empty($m[5])) {
                    $atts[strtolower($m[5])] = stripcslashes($m[6]);
                } elseif (isset($m[7]) && strlen($m[7])) {
                    $atts[] = stripcslashes($m[7]);
                } elseif (isset($m[8]) && strlen($m[8])) {
                    $atts[] = stripcslashes($m[8]);
                } elseif (isset($m[9])) {
                    $atts[] = stripcslashes($m[9]);
                }
            }
            // Reject any unclosed HTML elements
            foreach ($atts as &$value) {
                if (false !== strpos($value, '<')) {
                    if (1 !== preg_match('/^[^<]*+(?:<[^>]*+>[^<]*+)*+$/', $value)) {
                        $value = '';
                    }
                }
            }
        } else {
            $atts = ltrim($text);
        }
        return $atts;
    }

    /**
     * Retrieve the shortcode attributes regex.
     * Date: 2020-12-27
     * @return string The shortcode attribute regular expression
     * @since 4.4.0
     *
     */
    public static function get_shortcode_atts_regex()
    {
        return '/([\w-]+)\s*=\s*"([^"]*)"(?:\s|$)|([\w-]+)\s*=\s*\'([^\']*)\'(?:\s|$)|([\w-]+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|\'([^\']*)\'(?:\s|$)|(\S+)(?:\s|$)/';
    }

    public static function get_markdown_regex($tagName = '?')
    {
        return '\\' . $tagName . '&gt; (.*)(\n\n)?';

    }
    public static function tagParseCallback($matches)
    {
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }

        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数
        $type = @$attrs["type"];
        if ($type == "") {
            $type = "light dk";
        }
        $content = $matches[5];

        return '<span class="label bg-' . $type . '">' . $content . '</span>';

    }
    public static function returnExceptShortCodeContent($content)
    {

        // //排除QR
        // //排除倒计时
        // if (strpos($content, '[QR') !== false) {
        //     $pattern = self::get_shortcode_regex(array('QR'));
        //     $content = preg_replace("/$pattern/", '', $content);
        // }
        //排除图集
        if (strpos($content, '[album') !== false) {
            $pattern = self::get_shortcode_regex(array('album'));
            $content = preg_replace("/$pattern/", '', $content);
        }

        // //排除倒计时
        // if (strpos($content, '[countdown') !== false) {
        //     $pattern = self::get_shortcode_regex(array('countdown'));
        //     $content = preg_replace("/$pattern/", '', $content);
        // }
        //排除摘要的collapse 公式
        if (strpos($content, '[collapse') !== false) {
            $pattern = self::get_shortcode_regex(array('collapse'));
            $content = preg_replace("/$pattern/", '', $content);
        }

        if (strpos($content, '[tag') !== false) {
            $pattern = self::get_shortcode_regex(array('tag'));
            $content = preg_replace("/$pattern/", '', $content);
        }

        if (strpos($content, '[tabs') !== false) {
            $pattern = self::get_shortcode_regex(array('tabs'));
            $content = preg_replace("/$pattern/", '', $content);
        }

        //排除摘要中的块级公式
        $content = preg_replace('/\$\$[\s\S]*\$\$/sm', '', $content);
        //排除摘要的vplayer
        if (strpos($content, '[vplayer') !== false) {
            $pattern = self::get_shortcode_regex(array('vplayer'));
            $content = preg_replace("/$pattern/", '', $content);
        }
        //排除摘要中的短代码
        if (strpos($content, '[hplayer') !== false) {
            $pattern = self::get_shortcode_regex(array('hplayer'));
            $content = preg_replace("/$pattern/", '', $content);
        }
        if (strpos($content, '[post') !== false) {
            $pattern = self::get_shortcode_regex(array('post'));
            $content = preg_replace("/$pattern/", '', $content);
        }
        if (strpos($content, '[scode') !== false) {
            $pattern = self::get_shortcode_regex(array('scode'));
            $content = preg_replace("/$pattern/", '', $content);
        }
        // if (strpos($content, '[button') !== false) {
        //     $pattern = self::get_shortcode_regex(array('button'));
        //     $content = preg_replace("/$pattern/", '', $content);
        // }
        //排除回复可见的短代码
        if (strpos($content, '[hide') !== false) {
            $pattern = self::get_shortcode_regex(array('hide'));
            $content = preg_replace("/$pattern/", '', $content);
        }
        if (strpos($content, '[see') !== false) {
            $pattern = self::get_shortcode_regex(array('hide'));
            $content = preg_replace("/$pattern/", '', $content);
        }
        if (strpos($content, '[bplayer') !== false) {
            $pattern = self::get_shortcode_regex(array('hide'));
            $content = preg_replace("/$pattern/", '', $content);
        }
        if (strpos($content, '[bilibili') !== false) {
            $pattern = self::get_shortcode_regex(array('hide'));
            $content = preg_replace("/$pattern/", '', $content);
        }
        // //排除文档助手
        // if (strpos($content, '>') !== false) {
        //     $content = preg_replace("/(@|√|!|x|i)&gt;/", '', $content);
        // }

        // //排除login
        // if (strpos($content, '[login') !== false) {
        //     $pattern = self::get_shortcode_regex(array('login'));
        //     $content = preg_replace("/$pattern/", '', $content);
        // }

        return $content;
    }
    /**
     * 一篇文章中引用另一篇文章正则替换回调函数
     * @param $matches
     * @return bool|string
     */
    public static function quoteOtherPostCallback($matches)
    {
        
        // 不解析类似 [[post]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }

        //对$matches[3]的url如果被解析器解析成链接，这些需要反解析回来
        $matches[3] = preg_replace("/<a href=.*?>(.*?)<\/a>/", '$1', $matches[3]);
        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数

        //这里需要对id做一个判断，避免空值出现错误
        $cid = @$attrs["cid"];
        $url = @$attrs['url'];
        $cover = @$attrs['cover'];//封面
        $targetTitle = "";//标题
        $targetUrl = "";//链接
        $targetSummary = "";//简介文字
        $targetImgSrc = "";//封面图片地址
        if (!empty($cid)) {
            $db = Typecho_Db::get();
            $prefix = $db->getPrefix();
            $posts = $db->fetchAll($db
                ->select()->from($prefix . 'contents')
                ->orWhere('cid = ?', $cid)
                ->where('type = ? AND status = ? AND password IS NULL', 'post', 'publish'));
            //这里需要对id正确性进行一个判断，避免查找文章失败
            if (count($posts) == 0) {
                $targetTitle = "文章不存在，或文章是加密、私密文章";
            } else {
                $result = Typecho_Widget::widget('Widget_Abstract_Contents')->push($posts[0]);
                if ($cover == "" || $cover == "http://") {

                    $thumbArray = $db->fetchAll($db
                        ->select()->from($prefix . 'fields')
                        ->orWhere('cid = ?', $cid)
                        ->where('name = ? ', 'thumb'));
                    $targetImgSrc = 'https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/EDoKvz5p7BXZ46U.png';

                } else {
                    $targetImgSrc = $cover;
                }
                $targetSummary = Content::excerpt(Markdown::convert($result['text']), 60);
                $targetTitle = $result['title'];
                $targetUrl = $result['permalink'];
            }
        } else if (empty($cid) && $url !== "") {
            $targetUrl = $url;
            $targetSummary = @$attrs['intro'];
            $targetTitle = @$attrs['title'];
            $targetImgSrc = $cover;
        } else {
            $targetTitle = "文章不存在，请检查文章CID";
        }

        $imageHtml = "";
        $noImageCss = "";
        if (trim($targetImgSrc) !== "") {
            $imageHtml = '<div class="inner-image bg" style="background-image: url(' . $targetImgSrc . ');background-size: cover;"></div>
';
        } else {
            $noImageCss = 'style="margin-left: 10px;"';
        }

        return <<<EOF
<div class="preview">
<div class="post-inser post box-shadow-wrap-normal">
<a href="{$targetUrl}" target="_blank" class="post_inser_a no-external-link">
{$imageHtml}
<div class="inner-content" $noImageCss>
<p class="inser-title">{$targetTitle}</p>
<div class="inster-summary text-muted">
{$targetSummary}
</div>
</div>
</a>
<!-- .inner-content #####-->
</div>
<!-- .post-inser ####-->
</div>
EOF;

    }
    /**
     * 标签页，标签功能
     */
    public static function tabsParseCallback($matches)
    {
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }

        $content = $matches[5];

        $pattern = self::get_shortcode_regex(array('tab'));
        preg_match_all("/$pattern/", $content, $matches);
        $tabs = "";
        $tabContents = "";
        for ($i = 0; $i < count($matches[3]); $i++) {
            $item = $matches[3][$i];
            $text = $matches[5][$i];
            $id = "tabs-" . md5(uniqid()) . rand(0, 100) . $i;
            $attr = htmlspecialchars_decode($item);//还原转义前的参数列表
            $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数
            $name = @$attrs['name'];
            $active = @$attrs['active'];
            $in = "";
            $style = "style=\"";
            foreach ($attrs as $key => $value) {
                if ($key !== "name" && $key !== "active") {
                    $style .= $key . ':' . $value . ';';
                }
            }
            $style .= "\"";

            if ($active == "true") {
                $active = "active";
                $in = "in";
            } else {
                $active = "";
            }
            $tabs .= "<li class='nav-item $active' role=\"presentation\"><a class='nav-link $active' $style data-toggle=\"tab\" 
aria-controls='" . $id . "' role=\"tab\" href='#$id'>$name</a></li>";
            $tabContents .= "<div role=\"tabpanel\" id='$id' class=\"tab-pane fade $active $in\">
            $text</div>";
        }


        return <<<EOF
<div class="tab-container post_tab box-shadow-wrap-lg">
<ul class="nav no-padder b-b" role="tablist">
{$tabs}
</ul>
<div class="tab-content no-border">
{$tabContents}
</div>
</div>
EOF;
    }
    /**
     * 解析文章内容为图片列表（相册）
     * @param $content
     * @param $type
     * @return string
     */
    public static function parseContentToImage($content, $type)
    {
        preg_match_all('/<img.*?src="(.*?)"(.*?)(alt="(.*?)")??(.*?)\/?>/', $content, $matches);

        if (is_array($matches) && count($matches[0]) > 0) {

            $html = "";
            if ($type === "photos") {//自适应拉伸的
                $html .= "<div class='album-photos'>";
            } else {//统一宽度排列
                $html .= "<div class='photos'>";
            }
            for ($i = 0; $i < count($matches[0]); $i++) {
                $info = trim($matches[5][$i]);
                preg_match('/alt="(.*?)"/', $info, $info);
                if (is_array($info) && count($info) >= 2) {
//                        print_r($info);
                    $info = @$info[1];
                } else {
                    $info = "";
                }
                if ($type == "photos") {
                    $html .= <<<EOF
<figure>
        {$matches[0][$i]}
        <figcaption>{$info}</figcaption>
</figure>
EOF;
                } else {
                    $html .= <<<EOF
<figure class="image-thumb" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
          {$matches[0][$i]}
          <figcaption itemprop="caption description">{$info}</figcaption>
      </figure>
EOF;
                }
            }

            $html .= "</div>";

            return $html;
        } else {
            //解析失败，就不解析，交给前端进行解析，还原之前的短代码
            $type = ($type == "photos") ? ' type="photos"' : "";
            return "<div class='album_block'>\n\n[album" . $type . "]\n" . $content . "[/album] </div>";
        }


    }
        /**
     * 文章内相册解析
     * @param $matches
     * @return bool|string
     */
    public static function scodeAlbumParseCallback($matches)
    {
        // 不解析类似 [[player]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }

        //[scode type="share"]这是灰色的短代码框，常用来引用资料什么的[/scode]
        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数

        $content = $matches[5];


        return Content::parseContentToImage($content, @$attrs["type"]);


    }

    /**
     * 短代码解析[see]
     * Date: 2021-1-26
     */

    public static function seeParseCallback($matches){
        // 不解析类似 [[player]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }
        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数
        return '<span class="spoiler" title="你知道的太多了">'."\n\n" . $matches[5] . "\n".'</span>';
    }

    /**
     * bilibili小窗解析
     * Date: 2021-2-15
     */

    public static function bilibiliCallback($matches){
        // 不解析类似 [[player]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }
        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数
        if(empty(@$attrs['style'])){
            $style = 'gray';
        }else{
            $style = @$attrs['style'];
        }
        return '<iframe src="https://api.paugram.com/bili?bv='.@$attrs['id'].'&style="'.$style.'"" style="height: 10em; width: 100%"></iframe>';
    }

    /**
     * bilibili播放器解析
     * Date: 2021-2-15
     */

    public static function bPlayerParseCallback($matches){
        // 不解析类似 [[player]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }
        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数
        return '<iframe src="https://v.itggg.cn/?url="'.@$attrs[url].'"" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="100%" height="500px" frameborder="0"></iframe>';
    }

    /**
     * 视频解析的回调函数
     * @param $matches
     * @return bool|string
     */
    public static function videoParseCallback($matches)
    {
        // 不解析类似 [[player]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }
        //对$matches[3]的url如果被解析器解析成链接，这些需要反解析回来
        $matches[3] = preg_replace("/<a href=.*?>(.*?)<\/a>/", '$1', $matches[3]);
        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数
        if ($attrs['url'] !== null || $attrs['url'] !== "") {
            $url = $attrs['url'];
        } else {
            return "";
        }

        if (array_key_exists('pic', $attrs) && ($attrs['pic'] !== null || $attrs['pic'] !== "")) {
            $pic = $attrs['pic'];
        } else {
            $pic = 'https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/qsNmnC2zHB5FW41.jpg';
        }
        $playCode = '<video src="' . $url . '" style="background-image:url(' .
            $pic . ');background-size: cover;" controls></video>';

        //把背景图片作为第一帧
//        $playCode = '<video src="' . $url . '" poster="'.$pic.'"></video>';

        return $playCode;

    }
    /**
     * 音乐解析的正则替换回调函数
     * @param $matches
     * @return bool|string
     */
    public static function musicParseCallback($matches)
    {
        /*
        $mathes array
        * 1 - An extra [ to allow for escaping shortcodes with double [[]]
        * 2 - 短代码名称
        * 3 - 短代码参数列表
        * 4 - 闭合标志
        * 5 - 内部包含的内容
        * 6 - An extra ] to allow for escaping shortcodes with double [[]]
     */

        // 不解析类似 [[player]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }

        //[hplayer media=&quot; netease&quot; type=&quot; song&quot;  id=&quot; 23324242&quot; /]
        //对$matches[3]的url如果被解析器解析成链接，这些需要反解析回来
        $matches[3] = preg_replace("/<a href=.*?>(.*?)<\/a>/", '$1', $matches[3]);
        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数
        if (empty(@$attrs['photo'])) {
            @$attrs['photo'] = 'https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/sM2XCJTW8BdUe5i.jpg';
        }
        if (!empty(@$attrs['wangyi'])){
            $wangyi_url = 'https://api.paugram.com/netease?id='.@$attrs['wangyi'].'';
            $wangyi_json_arr = file_get_contents($wangyi_url);
            $wangyi_json = json_decode($wangyi_json_arr);
            $title = $wangyi_json->{'title'};
            $artist = $wangyi_json->{'artist'};
            $cover = $wangyi_json->{'cover'};
            $link = $wangyi_json->{'link'};
            $playCode = '<sqp data-title="'.$title.'" data-artist="'.$artist.'" data-cover="'.$cover.'" data-link="'.$link.'"></sqp>';
            
        }else{
            $playCode = '<sqp "'.@$attrs['site'].'" data-title="' . @$attrs['title'] . '" data-artist="' . @$attrs['author'] . '" data-cover="' . @$attrs['photo'] . '" data-link="' . @$attrs['url'] . '"></sqp>';
        }
        return $playCode;

    }
    /**
     * 短代码解析正则替换回调函数
     * Date: 2020-12-27
     * @param $matches
     * @return bool|string
     */
    public static function scodeParseCallback($matches)
    {
        // 不解析类似 [[player]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }
        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数
        $type = "info";
        switch (@$attrs['type']) {
            case 'yellow':
                $type = "Scode-Yellow";
                break;
            case 'red':
                $type = "Scode-Red";
                break;
            case 'blue':
                $type = "Scode-Blue";
                break;
            case 'green':
                $type = "Scode-Green";
                break;
            case 'share':
                $type = "Scode-zise";
                break;
            case 'pink':
                $type = "Scode-Pink";
                break;
            case 'pink-pro':
                $type = "Scode-Pink-Pro";
                break;
            case 'black':
                $type = "Scode-Black";
                break;
            case 'mhz':
                $type = "Scode-mhz";
                break;
            case 'xgh':
                $type = "Scode-xgh";
                break;
            case 'tkzj':
                $type = "Scode-tkzj";
                break;
            case 'xyz':
                $type = "Scode-xyz";
                break;
            case 'gll':
                $type = "Scode-gll";
                break;
            case 'xty':
                $type = "Scode-xty";
                break;
            case 'Shadow':
                $type = "Shadow";
                break;
            
        }
        return '<div class=" ' . $type . '">'."\n\n" . $matches[5] . "\n".'</div>';
    }
    /**
     * 解析显示按钮的短代码的正则替换回调函数
     * @param $matches
     * @return bool|string
     */
    public static function parseButtonCallback($matches)
    {
        // 不解析类似 [[post]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }
        //对$matches[3]的url如果被解析器解析成链接，这些需要反解析回来
        /*$matches[3] = preg_replace("/<a href=.*?>(.*?)<\/a>/",'$1',$matches[3]);*/
        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数
        $color = "red";
        $linkUrl = "";

        if (@$attrs['url'] != "") {
            $linkUrl = 'window.open("' . $attrs['url'] . '","_blank")';
        }
        if (@$attrs['color'] != "") {
            $color = $attrs['color'];
        }

        return <<<EOF
<button class="btn {$color}" onclick='{$linkUrl}'>{$matches[5]}</button>
EOF;
    }

    /**
     * 进度条解析
     * @param $matches
     * @return bool|string
     */

     public static function loadCallback($matches)
     {
        // 不解析类似 [[player]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }

        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数

        $value = @$attrs['value'];

        return <<<EOF
<progress value="{$value}" max="100"></progress>
EOF;
     }
    /**
     * 折叠框解析
     * @param $matches
     * @return bool|string
     */
    public static function collapseParseCallback($matches)
    {
        // 不解析类似 [[player]] 双重括号的代码
        if ($matches[1] == '[' && $matches[6] == ']') {
            return substr($matches[0], 1, -1);
        }

        $attr = htmlspecialchars_decode($matches[3]);//还原转义前的参数列表
        $attrs = self::shortcode_parse_atts($attr);//获取短代码的参数

        $title = $attrs['title'];
        $default = @$attrs['status'];
        if ($default == null || $default == "") {
            $default = "true";
        }
        if ($default == "false") {//默认关闭
            $class = "collapse";
        } else {
            $class = "collapse in";
        }
        $content = $matches[5];
        $notice = '开合';
        $id = "collapse-" . md5(uniqid()) . rand(0, 100);

        return <<<EOF
<div class="panel panel-default collapse-panel box-shadow-wrap-lg"><div class="panel-heading panel-collapse" data-toggle="collapse" data-target="#{$id}" aria-expanded="true"><div class="accordion-toggle"><span>{$title}</span>
<i class="pull-right fontello icon-fw fontello-angle-right"></i>
</div>
</div>
<div id="{$id}" class="panel-body {$class}">
{$content}
</div></div>
EOF;


    }
    
    /**
     * 文章解析函数
     * Date: 2020-12-27
     * @param $content
     * @return null|string|string[]
     */
    public static function parseContentPublic($content)
    {
        //解析短代码功能
        if (strpos($content, '[scode') !== false) {//提高效率，避免每篇文章都要解析
            $pattern = self::get_shortcode_regex(array('scode'));
            $content = preg_replace_callback("/$pattern/", array('Content', 'scodeParseCallback'),
                $content);
        }
        //解析防剧透功能
        if (strpos($content,'[see') !== false){
            $pattern = self::get_shortcode_regex(array('see'));
            $content = preg_replace_callback("/$pattern/", array('Content', 'seeParseCallback'),
                $content);
        }
        //文章中标签页的功能
        if (strpos($content, '[tabs') !== false) {
            $pattern = self::get_shortcode_regex(array('tabs'));
            $content = preg_replace_callback("/$pattern/", array('Content', 'tabsParseCallback'),
                $content);
        }

        //文章中标签功能
        if (strpos($content, '[tag') !== false) {
            $pattern = self::get_shortcode_regex(array('tag'));
            $content = preg_replace_callback("/$pattern/", array('Content', 'tagParseCallback'),
                $content);
        }

        //解析文章内图集
        if (strpos($content, '[album') !== false) {
            $pattern = self::get_shortcode_regex(array('album'));
            $content = Utils::handle_preg_replace_callback("/$pattern/", array('Content', 'scodeAlbumParseCallback'),
                $content);
        }

        //文章中折叠框功能
        if (strpos($content, '[collapse') !== false) {
            $pattern = self::get_shortcode_regex(array('collapse'));
            $content = preg_replace_callback("/$pattern/", array('Content', 'collapseParseCallback'),
                $content);
        }

        //调用其他文章页面的摘要
        if (strpos($content, '[post') !== false) {//提高效率，避免每篇文章都要解析
            $pattern = self::get_shortcode_regex(array('post'));
            $content = preg_replace_callback("/$pattern/", array('Content', 'quoteOtherPostCallback'), $content);
        }
        //解析Bilibili小窗
        if (strpos($content, '[bilibili') !== false) {//提高效率，避免每篇文章都要解析
            $pattern = self::get_shortcode_regex(array('bilibili'));
            $content = preg_replace_callback("/$pattern/", array('Content', 'bilibiliCallback'), $content);
        }
        //解析BBB播放器
        if (strpos($content, '[bplayer') !== false) {//提高效率，避免每篇文章都要解析
            $pattern = self::get_shortcode_regex(array('bplayer'));
            $content = preg_replace_callback("/$pattern/", array('Content', 'bPlayerParseCallback'), $content);
        }
        //文章中视频播放器功能
        if (strpos($content, '[vplayer') !== false) {//提高效率，避免每篇文章都要解析
            $pattern = self::get_shortcode_regex(array('vplayer'));
            $content = Utils::handle_preg_replace_callback("/$pattern/", array('Content', 'videoParseCallback'), $content);
        }

        //文章中播放器功能(适配handsome)
        if (strpos($content, '[hplayer') !== false) {//提高效率，避免每篇文章都要解析
            $pattern = self::get_shortcode_regex(array('hplayer'));
            $content = Utils::handle_preg_replace_callback("/$pattern/", array('Content', 'musicParseCallback'), $content);
        }
        //解析显示按钮短代码
        if (strpos($content, '[button') !== false) {//提高效率，避免每篇文章都要解析
            $pattern = self::get_shortcode_regex(array('button'));
            $content = Utils::handle_preg_replace_callback("/$pattern/", array('Content', 'parseButtonCallback'), $content);
        }
        //解析进度条
        if (strpos($content, '[load') !== false) {//提高效率，避免每篇文章都要解析
            $pattern = self::get_shortcode_regex(array('load'));
            $content = Utils::handle_preg_replace_callback("/$pattern/", array('Content', 'loadCallback'), $content);
        }
        return $content;
    }

    /**
     * 替换+输出文章内容
     * Date: 2020-12-27
     *
     * @param $obj
     * @param $status
     * @param string $way
     * @return string
     */
    public static function postContent($obj, $status, $way = "origin")
    {
        if ($way == "origin") {
            $content = $obj->content;
        } else {
            $content = $obj->content;

            
        }            
        //文章中部分内容隐藏功能（回复后可见）
        if ($status || $result) {
            $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm", '<div class=" Scode-tkzj">$1</div>', $content);
        } else {
            $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm", '<div class=" Scode-tkzj">此处内容需要评论回复后（审核通过）方可阅读。</div>', $content);
        }
        $content = Content::parseContentPublic($content);
        return trim($content);
    }

    public static function postContentHtml($obj, $status)
    {

        //$way = "origin";
        
        $content = Content::postContent($obj, $status, $way);
        
        echo $content;

    }
    /**
     * 解析头部图标
     */
    public static function returnHeadItem($headnavItem, $haveSub, $subListHtml, $ISsub = 'no')
    {

        $ret = "";
        @$itemName = $headnavItem->name;
        @$itemStatus = $headnavItem->status;
        @$itemLink = $headnavItem->link;
        @$itemClass = $headnavItem->class;
        @$itemFeather = $headnavItem->feather;
        @$itemSub = $headnavItem->sub;
        @$itemTarget = $headnavItem->target;


        if (@$itemTarget) {
            $linkStatus = 'target="' . $itemTarget . '"';
        } else {
            $linkStatus = 'target="_self"';
        }



        if (trim($itemClass) !== "") {
            $ret = ' <div class="has-child"><a ' . $linkStatus . ' href="' . $itemLink . '"><i class="'
                . $itemClass . '"></i><span>' . $itemName . '</span></a>' . $subListHtml . '</div>';
        }
        if ($ISsub != 'no') {
            $ret = ' <a ' . $linkStatus . ' href="' . $itemLink . '"><i class="'
            . $itemClass . '"></i><span>' . $itemName . '</span></a>';
        }
        // <li> <a target="_self" href="xxx.com" class="auto" data-pjax-state=""><span class="nav-icon"><i data-feather="music"></i></span><span>网易云音乐</span></a></li>
        return $ret;
    }
    /*
     * 解析语录页
     * Author：Wibus
     * 参照：Typecho-theme-Paul
     * 相关变量：$content
     * Date: 12-19
     */
    static function parse_says($content)
    {
        // 匹配每行 放入数组

        preg_match_all('/<p>(.*?)<\/p>/', $content, $says);

        $content = array();
        foreach ($says['1'] as $key => $saying) {
            $content[] = preg_split('/((-){2,}|————|——)/', $saying);  // 匹配提取----|---|--|————|——后的内容

        }
        $author_names = array();
        $say_bodys = array();
        foreach ($content as $key => $value) {
            if (count($value) != 1) {
                $author_names[] = '来源: ' . array_pop($value);   // 分割后数量如果为1 说明作者提取失败
            } else {
                $author_names[] = '';  // 失败情况加入处理
            }

            $say_bodys[] = implode("——", $value);  // 合并多余的分割项
        }

        foreach ($say_bodys as $key => $saying) {
            yield $author_names[$key] => $saying;
        }

    }

       /*
        * 解析MoreJSON信息
        * Author: Wibus
        * 相关变量：$MoreJsonName $MoreJsonLink $MoreJsonMore
        * Date：2020.12.13
        */
   /* public function GetMoreJson()
    {
        //$morejson = $this->options->MoreJSON; //获取设置选项
        $MoreJson = json_decode($this->options->MoreJSON); //对json转存为数组
        $MoreJsonName1 = $MoreJson->{'Name1'};
        $MoreJsonLink1 = $MoreJson->{'Link1'};
        $MoreJsonMore1 = $MoreJson->{'More1'};
        $MoreJsonName2 = $MoreJson->{'Name2'};
        $MoreJsonLink2 = $MoreJson->{'Link2'};
        $MoreJsonMore2 = $MoreJson->{'More2'};
        $MoreJsonName3 = $MoreJson->{'Name3'};
        $MoreJsonLink3 = $MoreJson->{'Link3'};
        $MoreJsonMore3 = $MoreJson->{'More3'};
        $MoreJsonName4 = $MoreJson->{'Name4'};
        $MoreJsonLink4 = $MoreJson->{'Link4'};
        $MoreJsonMore4 = $MoreJson->{'More4'};
    }*/

    /*
    * 首页随机缩略图
    * Author: Wibus
    * 使用方法：<img src="<?php echo thumb($this->cid, $GLOBALS['assetURL']); ?>" />
    * Date：2020.12.12
    */

//     public static function random_avatar_color()
//     {
//         $links="https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/EGk4qUvcXDygV2z.png
// https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/5QdwFC82gT3XPSZ.png
// https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/EDoKvz5p7BXZ46U.png
// https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/Ihj5QAZgVMqr9fJ.png
// https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/KiOuTlCzge7JHh3.png
// https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/Qr2ykmsEFpJn4BC.jpg
// https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/KZ6jv8C92Vpwcih.jpg
// https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/7TOEIPwGrZB1qFb.jpg"; 
//         $links=explode("\n",$links); 
//         return $links[rand(0,count($links)-1)]; 
//     }

//     public static function bphoto()
//     {
//         $bphoto=Content::random_avatar_color(); 
//         echo $bphoto; 
//     }

    /*
    * 解析MoreJSON信息
    * Author: Wibus
    * 相关变量：$MoreJsonName $MoreJsonLink $MoreJsonMore
    * Date：2020.12.13
    */
    //$morejson = $this->options->MoreJSON; //获取设置选项
    // public static function More_JSON($the_option){
    // $MoreJson = json_decode($the_option); //对json转存为数组
    // $MoreJsonName1 = $MoreJson->{'Name1'};
    // $MoreJsonLink1 = $MoreJson->{'Link1'};
    // $MoreJsonMore1 = $MoreJson->{'More1'};
    // $MoreJsonName2 = $MoreJson->{'Name2'};
    // $MoreJsonLink2 = $MoreJson->{'Link2'};
    // $MoreJsonMore2 = $MoreJson->{'More2'};
    // $MoreJsonName3 = $MoreJson->{'Name3'};
    // $MoreJsonLink3 = $MoreJson->{'Link3'};
    // $MoreJsonMore3 = $MoreJson->{'More3'};
    // $MoreJsonName4 = $MoreJson->{'Name4'};
    // $MoreJsonLink4 = $MoreJson->{'Link4'};
    // $MoreJsonMore4 = $MoreJson->{'More4'};

    // }
}






