<!--头部必要元素-->
<?php $this->need('header.php'); ?>

<?php $PostChoice = $this->fields->PostChoice;?>
<?php $this->need('component/headnav.php'); ?>
<?php if ($PostChoice == 0): ?>
<div id="main_load">
<main class="is-article" >
<?php $this->need('component/article_post.php'); ?>
</main>
</div>
<?php elseif ($PostChoice == 1): ?>
<div  id="main_load">
<main class="is-article is-note post-content paul-note" >
<?php $this->need('component/dairy_post.php'); ?>
</main>
</div>
<?php endif; ?>
<!--必要底部元素-->
<?php $this->need('footer.php'); ?>