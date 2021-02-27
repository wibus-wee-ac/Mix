<article class="note-article" style="opacity: 1; transform: translate(0px, 0px);">
   <h1><?php $this->date(); ?>&nbsp;&nbsp;<small style="font-size: 30%">[<a href="javascript:FontZoom(20)">大</a>  <a href="javascript:FontZoom(16)">中</a>  <a href="javascript:FontZoom(12)">小</a>]
    </small></h1>
   <h2 title="创建于 <?php $this->date(); ?>" style="text-align: center;"><?php $this->title() ?></h2>
   <div id="write">
    <div class="paragraph">
     <span class="indent"> <?php Content::postContentHtml($this,$this->user->hasLogin()); ?></span>
    </div>
   </div>
<!--
   <section class="paul-more">
    <button class="btn green">前一篇</button>
    <button class="btn yellow">时间线</button>
   </section>
-->
<script>//ks.lazy("img");</script>
<?php if (!empty($this->options->Show_what) && in_array('ShowComment', $this->options->Show_what)): ?>
<?php $this->need('comments.php')?>
<?php endif; ?>
  </article>