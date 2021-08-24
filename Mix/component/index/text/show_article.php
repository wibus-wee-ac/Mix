<style>
    .show-article {
        margin-top: 50px!important;
    }
    .wrap {
        margin: 0 auto;
        max-width: 1200px;
        /* padding: 0 1.25em; */
        box-sizing: content-box;
    }
    .show-article-main p{
        color: rgba(0, 2, 0, 0.199);
    }
    html.dark .show-article-main p{
        color: #e0e0e0;
    }
</style>
<div class="show-article-main">
<?php if ($this->have()): ?>
<?php while($this->next()): ?>
        <div class="wrap show-article" style="animation: <?php $this->options->IndexAction()?>">
            <h2><?php $this->title() ?></h2>
            <p style=""><?php $this->excerpt(200, '...'); ?></p>
            <a class="btn yellow" href="<?php $this->permalink() ?>">阅读全文</a>
</div>
<?php endwhile; ?>
<?php $this->pageLink('下一页','next'); ?>
<?php $this->pageLink('上一页'); ?>
<?php endif; ?>
</div>