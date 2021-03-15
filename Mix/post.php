<!--头部必要元素-->
<?php 

$this->need('header.php');

$PostChoice = $this->fields->PostChoice;
if ($this->options->headNavStyle == 1){
    $this->need('component/headnav/headnav.php'); 
}else if ($this->options->headNavStyle == 2){
    $this->need('component/headnav/new_headnav.php'); 
}

?>

<?php if ($PostChoice == 0): ?>
<div id="main_load">
<main class="is-article" >
<script src="<?php echo $GLOBALS['assetURL'] ?>js/Typing.js"></script>
<?php $this->need('component/post/article_post.php'); ?>

</main>
</div>
<?php elseif ($PostChoice == 1): ?>
<div  id="main_load">
<main class="is-article is-note post-content paul-note" >
<?php $this->need('component/post/dairy_post.php'); ?>
</main>
</div>
<?php endif; ?>
<!--必要底部元素-->
<?php $this->need('footer.php'); ?>