<!--libs.php-->
<?php require_once 'libs/libs.php'; 
$num = 0;
?>
<meta name="description" content="<?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('%s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?>">
<!--头部必要元素-->
<?php $this->need('header.php'); ?>

<?php 
if ($this->options->headNavStyle == 1){
$this->need('component/headnav/headnav.php'); 
}else if ($this->options->headNavStyle == 2){
$this->need('component/headnav/new_headnav.php'); 
}
?>

<div  id="main_load">
<main  class="is-article" id="article-wrap">

<?php 
if ($this->options->sideBarStyle == 2) {$this->need('component/sidebar.php');}
?>

    <section class="post-title">
        <h1>
            <div>
                <div class="texty mask-bottom" style="opacity: 1;"><span class=""
                        style="opacity: 1; transform: translate(0px, 0%);"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('%s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?></span></div>
            </div>
        </h1>
        <h2>
            <div>
                <div class="texty mask-bottom" style="opacity: 1;"><span class=""
                        style="opacity: 1; transform: translate(0px, 0%);">文章人，加油！</span>
            </div>
        </h2>
    </section>
    <div>
        <article class="post-content paul-note" style="opacity: 1;">
            <article class="post-content paul-note article-list">
                <ul>
                    <div>
                    <?php while ($this->next()) : ?>
                        <li class="" style="opacity: 1; transform: translate(0px, 0px);animation: <?php $this->options->LinksAction(); ?>; "><a
                                href="<?php $this->permalink() ?>" rel="noopener"><?php $this->title() ?></a><span class="meta"><?php $this->date(); ?></span></li>
                    <?php endwhile; ?>
                    </div>
                </ul>
            </article>
        </article>
    </div>
    </main>
</div>

<!--必要底部元素-->
<?php $this->need('footer.php'); ?>