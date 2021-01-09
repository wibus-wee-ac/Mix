<?php

/*
 * libs.php
 * Author: Wibus
 * Here is Some Idea.
 */

class Content{

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
        //[scode type="share"]这是灰色的短代码框，常用来引用资料什么的[/scode]
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
            case 'lblue':
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

            $content = Content::parseContentPublic($content);
        }
        return trim($content);
    }

    public static function postContentHtml($obj, $status)
    {

        //$way = "origin";
        
        $content = Content::postContent($obj, $status, $way);
        
        echo $content;

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
    * 使用方法：<img src="<?php Content::bphoto(); ?>" />
    * Date：2020.12.12
    */

    public static function random_photo()
    {
        $links="https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/EGk4qUvcXDygV2z.png
https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/5QdwFC82gT3XPSZ.png
https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/EDoKvz5p7BXZ46U.png
https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/Ihj5QAZgVMqr9fJ.png
https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/KiOuTlCzge7JHh3.png
https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/Qr2ykmsEFpJn4BC.jpg
https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/KZ6jv8C92Vpwcih.jpg
https://gitee.com/wibus/blog-assets-goo/raw/master/asset-pic/7TOEIPwGrZB1qFb.jpg"; 
        $links=explode("\n",$links); 
        return $links[rand(0,count($links)-1)]; 
    }

    public static function bphoto()
    {
        $bphoto=Content::random_photo(); 
        echo $bphoto; 
    }

}






