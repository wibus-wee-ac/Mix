<?php
/**
 * 空间混合体
 * 
 * @package Mix
 * @author Wibus
 * @version 1.4.2
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
    ?>
<?php $this->need('component/index/text/show_article.php'); ?>
<?php endif;?>
</div>
</section>

</main>
</div>
<!--必要底部元素-->
<?php $this->need('footer.php'); ?>