<?php
/**
 * 空间混合体
 * 
 * @package Mix
 * @author Wibus
 * @version 1.2.2
 * @link https://blog.iucky.cn
 */

require_once 'functions.php';
require_once 'component/libs.php';


/*
 * Author: LingXI
 * If you Delete this, your site will be died!
 */
$authcode = $this->options->AuthCode;
    if(!isset($_SESSION['authcode'])) {
    	$query=file_get_contents('https://auth.iucky.cn/check.php?url='.$_SERVER['HTTP_HOST'].'&authcode='.$authcode.'&app=1');
    	$query=json_decode($query,true);
    	if($query['code']==1){$_SESSION['authcode']=$authcodea;}
    		else {
    		   exit("<h3>".$query['msg']."</h3>");
    		}
    	
    }


?>



<!--头部必要元素-->
<?php $this->need('header.php'); ?>
<?php $this->header(); ?>
<?php $this->options->HeadHTML(); ?>

<!--顶部分类配件-->
<?php $this->need('component/headnav.php'); ?>
<div id="main_load">
<main>
<!--顶部最大头像以及附属svg-->
<?php $this->need('component/area-head.php'); ?>

<section class="paul-news" style="min-height:34rem">
<div class="demo-content">

<?php if (!empty($this->options->Show_what) && in_array('ShowArticle', $this->options->Show_what)): ?>
<!--文章输出配件-->
<?php $this->need('component/article.php'); ?>
<?php endif; ?>

<?php if (!empty($this->options->Show_what) && in_array('ShowDairy', $this->options->Show_what)): ?>
<!--日记输出配件-->
<?php $this->need('component/dairy.php'); ?>
<?php endif; ?>

<?php if (!empty($this->options->Show_what) && in_array('ShowMore', $this->options->Show_what)): ?>
<!--更多输出配件-->
<?php $this->need('component/more.php'); ?>
<?php endif; ?>
</div>
</section>
</main>
</div>
<?php $this->footer(); ?>
<!--必要底部元素-->
<?php $this->need('footer.php'); ?>