<link rel="stylesheet" href="<?php echo $GLOBALS['assetURL'] ?>css/torTree.css" data-n-g="">
<div class="torTree">
            <div class="torTree-wrap" id="torTree-wrap" style="opacity: 0">
            </div>
</div>
<section class="post-title">
    <h1>
     <div>
      <div class="texty mask-bottom">
       <span class="" style="opacity: 1; transform: translate(0px, 0%);"><?php $this->title() ?></span>&nbsp;&nbsp;<small style="font-size: 30%">[<a href="javascript:FontZoom(20)">大</a>  <a href="javascript:FontZoom(16)">中</a>  <a href="javascript:FontZoom(12)">小</a>]
    </small>

      </div>
     </div></h1>
   </section>
   <article class="post-content paul-note" style="opacity: 1;">
       
     <div id="write" class="focus">
         
     <?php Content::postContentHtml($this,$this->user->hasLogin()); ?>
             <!--<section class="kami-toc Toc_toc__1AtMD" style="z-index: 3;"><div class="container Toc_container__100rU" style="max-width: 184.5px;"><div class="Toc_anime-wrapper__1l8Kz"><a data-scroll="true" href="#0¡菜品介绍" data-index="0" class="Toc_toc-link__1Yat3" data-depth="2" style="opacity: 1; transform: translate(0px, 0px);"><span class="Toc_a-pointer__3AN3u">菜品介绍</span></a><a data-scroll="true" href="#1¡由来传说" data-index="1" class="Toc_toc-link__1Yat3" data-depth="2" style="opacity: 1; transform: translate(0px, 0px);"><span class="Toc_a-pointer__3AN3u">由来传说</span></a><a data-scroll="true" href="#2¡制作方法" data-index="2" class="Toc_toc-link__1Yat3 Toc_active__1DI_m" data-depth="2" style="opacity: 1; transform: translate(0px, 0px);"><span class="Toc_a-pointer__3AN3u">制作方法</span></a><a data-scroll="true" href="#3¡心得体会" data-index="3" class="Toc_toc-link__1Yat3" data-depth="2" style="opacity: 1; transform: translate(0px, 0px);"><span class="Toc_a-pointer__3AN3u">心得体会</span></a></div></div></section>-->
             <section class="kami-toc Toc_toc__1AtMD" style="z-index: 3;"><?php getCatalog();?></section>
    </div>
    <?php if (!empty($this->options->Show_what) && in_array('ShowCopyRight', $this->options->Show_what)): ?>
    <section class="Copyright_copyright-session__3Q0fD">
      <p>文章标题: <?php $this->title() ?></p>
      <p>文章作者: <?php $this->author(); ?></p>
      <p>文章链接: <span><?php $this->permalink() ?></span></p>
      <hr />
      <div>
       <p>商业转载请联系站长获得授权，非商业转载请注明本文出处及文章链接，未经站长允许不得对文章文字内容进行修改演绎。<br />本文采用<a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" rel="noopener">创作共用保留署名-非商业-禁止演绎4.0国际许可证</a></p>
      </div>
     </section>
     <?php endif; ?>
     <div class="note-inform">
      <span>
       <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" class="svg-inline--fa fa-calendar fa-w-14 Action_icon__3BtwG" role="img" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512">
        <path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path>
       </svg><?php $this->date(); ?></span>
      <span>
       <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="hashtag" class="svg-inline--fa fa-hashtag fa-w-14 Action_icon__3BtwG" role="img" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512">
        <path fill="currentColor" d="M440.667 182.109l7.143-40c1.313-7.355-4.342-14.109-11.813-14.109h-74.81l14.623-81.891C377.123 38.754 371.468 32 363.997 32h-40.632a12 12 0 0 0-11.813 9.891L296.175 128H197.54l14.623-81.891C213.477 38.754 207.822 32 200.35 32h-40.632a12 12 0 0 0-11.813 9.891L132.528 128H53.432a12 12 0 0 0-11.813 9.891l-7.143 40C33.163 185.246 38.818 192 46.289 192h74.81L98.242 320H19.146a12 12 0 0 0-11.813 9.891l-7.143 40C-1.123 377.246 4.532 384 12.003 384h74.81L72.19 465.891C70.877 473.246 76.532 480 84.003 480h40.632a12 12 0 0 0 11.813-9.891L151.826 384h98.634l-14.623 81.891C234.523 473.246 240.178 480 247.65 480h40.632a12 12 0 0 0 11.813-9.891L315.472 384h79.096a12 12 0 0 0 11.813-9.891l7.143-40c1.313-7.355-4.342-14.109-11.813-14.109h-74.81l22.857-128h79.096a12 12 0 0 0 11.813-9.891zM261.889 320h-98.634l22.857-128h98.634l-22.857 128z"></path>
       </svg><?php $this->category('·'); ?>·<?php $this->tags('·', true, 'none'); ?></span>
      <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" rel="noopener" target="_blank" style="color: currentcolor;"><span title="创作共用保留署名-非商业-禁止演绎4.0国际许可证">
        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="creative-commons" class="svg-inline--fa fa-creative-commons fa-w-16 Action_icon__3BtwG" role="img" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 496 512">
         <path fill="currentColor" d="M245.83 214.87l-33.22 17.28c-9.43-19.58-25.24-19.93-27.46-19.93-22.13 0-33.22 14.61-33.22 43.84 0 23.57 9.21 43.84 33.22 43.84 14.47 0 24.65-7.09 30.57-21.26l30.55 15.5c-6.17 11.51-25.69 38.98-65.1 38.98-22.6 0-73.96-10.32-73.96-77.05 0-58.69 43-77.06 72.63-77.06 30.72-.01 52.7 11.95 65.99 35.86zm143.05 0l-32.78 17.28c-9.5-19.77-25.72-19.93-27.9-19.93-22.14 0-33.22 14.61-33.22 43.84 0 23.55 9.23 43.84 33.22 43.84 14.45 0 24.65-7.09 30.54-21.26l31 15.5c-2.1 3.75-21.39 38.98-65.09 38.98-22.69 0-73.96-9.87-73.96-77.05 0-58.67 42.97-77.06 72.63-77.06 30.71-.01 52.58 11.95 65.56 35.86zM247.56 8.05C104.74 8.05 0 123.11 0 256.05c0 138.49 113.6 248 247.56 248 129.93 0 248.44-100.87 248.44-248 0-137.87-106.62-248-248.44-248zm.87 450.81c-112.54 0-203.7-93.04-203.7-202.81 0-105.42 85.43-203.27 203.72-203.27 112.53 0 202.82 89.46 202.82 203.26-.01 121.69-99.68 202.82-202.84 202.82z"></path>
        </svg></span></a>

     </div>
    </article>
    <!-- <script>
            (() => {// 为小标题加上锚点
                const postContent = ks.select('.post-content');
                const titleArr = [];
                for (let i = 1; i < 5; i++) {
                    [...postContent.querySelectorAll(`h${i}`)].forEach((item, index) => {

                        const name = item.innerText.slice(-2) === '编辑' ? item.innerText.slice(0, item.innerText.length - 2) : item.innerText;
                        titleArr.push({tier: i, name, top: window.getElementTop(item)})
                    })
                }
                const torTreeWrap = ks.select('#torTree-wrap');
                if (titleArr.length === 1) {
                    return
                }
                let torTreeHTML = ` <div class="torTree-title"><a href="javascript:window.scrollSmoothTo(${titleArr[0].top})">${titleArr.shift().name}</a></div><ul>`;
                for (let item of titleArr) {
                    torTreeHTML = torTreeHTML + `<a href="javascript:window.scrollSmoothTo(${item.top})"><li class="tier-${item.tier}">${item.name}</li></a>`
                }
                torTreeHTML += `</ul>`;
                torTreeWrap.innerHTML = torTreeHTML;
                torTreeWrap.removeAttribute('style')
            })()
</script> -->
<?php if (!empty($this->options->Show_what) && in_array('ShowComment', $this->options->Show_what)): ?>
<?php $this->need('comments.php')?>
<?php endif; ?>
</div>
</section>