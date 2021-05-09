<?php
/**
 * 空间混合体
 * 
 * @package Mix
 * @author Wibus
 * @version 1.5.3
 * @link https://blog.iucky.cn
 */

?>



<!--头部必要元素-->
<?php $this->need('header.php'); ?>
<!--顶部分类配件-->
<?php 
if ($this->options->headNavStyle == 1){
$this->need('component/headnav/headnav.php'); 
debug('使用headnavStyle为1的头部导航栏');
}else if ($this->options->headNavStyle == 2){
$this->need('component/headnav/new_headnav.php'); 
debug('使用headnavStyle为2的头部导航栏');
}
?>
<div id="main_load">
<main>

<?php 
if ($this->options->sideBarStyle == 2) {$this->need('component/sidebar.php');}
?>

<!--顶部最大头像以及附属svg-->
<?php $this->need('component/index/area-head.php'); ?>
<?php if($this->options->showIndexStyle == 1): 
    debug('小卡片样式');
    ?>
<?php if($this->options->RSS):?>
<section
    class="paul-news"
    style="min-height:34rem; animation: <?php $this->options->IndexAction(); ?>;">
    <div class="demo-content">
        <div
            class="assets news-item"
            style="opacity: 1; transform: translate(0px, 0px);">
            <div class="assets news-head">
                <!--源：rgb(59, 14,163)-->
                <h3
                    class="assets title"
                    style="background-color: rgb(<?php echo mt_rand(5, 255); ?>, <?php echo mt_rand(5, 255); ?>, <?php echo mt_rand(5, 255); ?>);">
                    <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="book-open"
                        class="svg-inline--fa fa-book-open fa-w-18 SectionNews_icon__w_rh8"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 576 512">
                        <path
                            fill="currentColor"
                            d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"></path>
                    </svg>博客文章</h3>
                <h3
                    class="assets more"
                    style="background-color: rgb(<?php echo mt_rand(50, 255); ?>, <?php echo mt_rand(50, 255); ?>, <?php echo mt_rand(50, 255); ?>);">
                    <a class="assets" href="<?$this->options->RSS_Site();?>" rel="noopener">
                        <svg
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="chevron-right"
                            class="svg-inline--fa fa-chevron-right fa-w-10 "
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 320 512">
                            <path
                                fill="currentColor"
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                        </svg>
                    </a>
                </h3>
            </div>
            <div class="assets news-body">
                <div class="assets row s SectionNews_friends-wrap__3pfJV">
                <?php echo parse_RSS($this->options->RSS, $this->options->themeUrl);?>
                </div>
            </div>
        </div>
<? endif; ?>

<!--显示所有分类&文章-->
<?php $this->need('component/index/card/cate-article.php'); ?>

<!--友链-->
<?php $this->need('component/index/card/friends.php'); ?>


<?php if (!empty($this->options->Show_what_1) && in_array('ShowMore', $this->options->Show_what_1)): ?>
<!--更多输出配件-->
<?php $this->need('component/index/card/more.php'); ?>
<?php endif; ?>
<?php elseif($this->options->showIndexStyle == 2):
    debug('纯文字样式');
    $this->need('component/index/text/show_article.php');
    endif;
?>
</div>
</section>

</main>
</div>
<!--必要底部元素-->
<?php $this->need('footer.php'); ?>