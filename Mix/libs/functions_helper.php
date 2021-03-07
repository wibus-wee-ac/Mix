<?php
/**
 * functions_helper.php
 * 用于为functions新增一些新玩意
 * @author Wibus
 */

Helper::options()->commentsAntiSpam = false; //关闭反垃圾
Helper::options()->commentsCheckReferer = false; //关闭检查评论来源URL与文章链接是否一致判断(否则会无法评论)
Helper::options()->commentsMaxNestingLevels = '999'; //最大嵌套层数
Helper::options()->commentsPageDisplay = 'first'; //强制评论第一页
Helper::options()->commentsOrder = 'DESC'; //将最新的评论展示在前
Helper::options()->commentsHTMLTagAllowed = '<a href=""> <img src=""> <img src="" class=""> <code> <del>';
Helper::options()->commentsMarkdown = true;
/**
 * thumb 随机头图
 * 逻辑：有图片附件，就调用第1个图片附件，否则随机显示
 */
function thumb($cid, $site_Url) {
    if (empty($imgurl)) {
    $rand_num = 23; //随机图片数量，根据图片目录中图片实际数量设置
    if ($rand_num == 0) {
    $imgurl = $site_Url.'img/0.png';
    //如果$rand_num = 0,则显示默认图片，须命名为"0.png"，注意是绝对地址
        }else{
    $imgurl = $site_Url.'img/'.rand(1,$rand_num).'.png';
    //随机图片，须按"1.png","2.png","3.png"...的顺序命名，注意是绝对地址
        }
    }
        echo $imgurl;
    }


/**
 * 实时人数显示
 */
//在线人数
function online_users() {
    $filename='online.txt'; //数据文件
    $cookiename='Nanlon_OnLineCount'; //Cookie名称
    $onlinetime=30; //在线有效时间
    $online=file($filename); 
    $nowtime=$_SERVER['REQUEST_TIME']; 
    $nowonline=array(); 
    foreach($online as $line){ 
        $row=explode('|',$line); 
        $sesstime=trim($row[1]); 
        if(($nowtime - $sesstime)<=$onlinetime){
            $nowonline[$row[0]]=$sesstime;
        } 
    } 
    if(isset($_COOKIE[$cookiename])){
        $uid=$_COOKIE[$cookiename]; 
    }else{
        $vid=0;
        do{
            $vid++; 
            $uid='U'.$vid; 
        }while(array_key_exists($uid,$nowonline)); 
        setcookie($cookiename,$uid); 
    } 
    $nowonline[$uid]=$nowtime;
    $total_online=count($nowonline); 
    if($fp=@fopen($filename,'w')){ 
        if(flock($fp,LOCK_EX)){ 
            rewind($fp); 
            foreach($nowonline as $fuid=>$ftime){ 
                $fline=$fuid.'|'.$ftime."\n"; 
                @fputs($fp,$fline); 
            } 
            flock($fp,LOCK_UN); 
            fclose($fp); 
        } 
    } 
    echo "$total_online"; 
} 
function createCatalog($obj) {
    //为文章标题添加锚点
    global $catalog;
    global $catalog_count;
    $catalog = array();
    $catalog_count = 0;
    $obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function ($obj) {
        global $catalog;
        global $catalog_count;
        $catalog_count++;
        $catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
        return '<h' . $obj[1] . $obj[2] . '><a name="cl-' . $catalog_count . '"></a>' . $obj[3] . '</h' . $obj[1] . '>';
    }, $obj);
    return $obj;
}

function getCatalog() {
    //输出文章目录容器
    global $catalog;
    $index = '';
    if ($catalog) {
        $index = '<div>' . "\n";
        $prev_depth = '';
        $to_depth = 0;
        foreach ($catalog as $catalog_item) {
            $catalog_depth = $catalog_item['depth'];
            if ($prev_depth) {
                if ($catalog_depth == $prev_depth) {
                    $index .= '</a>' . "\n";
                } elseif ($catalog_depth > $prev_depth) {
                    $to_depth++;
                    $index .= '<div>' . "\n";
                } else {
                    $to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
                    if ($to_depth2) {
                        for ($i = 0; $i < $to_depth2; $i++) {
                            $index .= '</li>' . "\n" . '</ul>' . "\n";
                            $to_depth--;
                        }
                    }
                    $index .= '</li>';
                }
            }
            // $index .= '<li><a href="#cl-' . $catalog_item['count'] . '">' . $catalog_item['text'] . '</a>';
            $index .= '<a data-scroll="true" href="#cl-' . $catalog_item['count'] . '" data-index="0" class="Toc_toc-link__1Yat3" data-depth="2" style="opacity: 1; transform: translate(0px, 0px);" ><span class="Toc_a-pointer__3AN3u">' . $catalog_item['text'] . '</span>';
            $prev_depth = $catalog_item['depth'];
        }
        for ($i = 0; $i <= $to_depth; $i++) {
            $index .= '</a>' . "\n" . '</div>' . "\n";
        }
        $index = '<div class="container Toc_container__100rU" style="max-width: 184.5px;">' .
            '<div class="Toc_anime-wrapper__1l8Kz">' . "\n" .
            $index .
            '</div>' . "\n".
            '</div>';
    }
    echo $index;
}
function themeInit($archive) {
    if ($archive->is('single')) {
        $archive->content = createCatalog($archive->content);
    }
}
