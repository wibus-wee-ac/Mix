<?php $this->need('component/loader.php');
?>
<style>
@media all and (max-width:600px){
  #headnav-a{
    color: #664238!important;
  }
}
@media all and (min-width:600px){
    #btn_active{ display: none!important;}
}
#headnav-a{
    color: white;
  }
</style>
<header class="assets" id="header">
    <div class="jsx-685620294 head-btn" id="btn_active" style="display: flex; align-items: center; justify-content: center; padding: 1em; cursor: pointer;"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list-ul" class="svg-inline--fa fa-list-ul fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M48 48a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm448 16H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path></svg></div>
    
        <div class="assets head-logo"><a id="headnav-a" href="<?php Helper::options()->siteUrl()?>">
        
        <?php if($this->options->HeadNavPhoto): ?>
        <?php $this->options->HeadNavPhoto(); ?>
        <?php else: ?>
          <svg viewBox="0 0 200 200" version="1.1">
                      
                      <g id="Custom-Preset" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group" transform="translate(1.000000, 0.000000)">
                          <g transform="translate(0.891670, 0.001664)" fill-rule="nonzero">
                            <g id="Shape-2" fill="currentColor">
                              <path
                                d="M97.9232558,0 C43.8413297,0 0,43.8413297 0,97.9232558 C0,152.005182 43.8413297,195.846512 97.9232558,195.846512 C152.005182,195.846512 195.846512,152.005182 195.846512,97.9232558 C195.846512,43.8413297 152.005182,0 97.9232558,0 Z M97.9232558,184.96615 C49.8516415,184.96615 10.8803618,145.99487 10.8803618,97.9232558 C10.8803618,49.8516415 49.8516415,10.8803618 97.9232558,10.8803618 C145.99487,10.8803618 184.96615,49.8516415 184.96615,97.9232558 C184.96615,145.99487 145.99487,184.96615 97.9232558,184.96615 Z"
                                id="Shape"></path>
                            </g>
                            <circle id="Oval" cx="97.9232558" cy="97.9232558" r="78.8162791"></circle>
                          </g>
                          <g transform="translate(48.391670, 47.501664)" id="Shape" stroke="currentColor" stroke-width="8.8">
                            <path
                              d="M50.1120234,100.116279 L0,50.1120234 L50.1120234,0 L100.116279,50.0042556 L50.1120234,100.116279 Z M90.5813953,57.2093023 L72.7145681,40.3711034 L50.1119553,19.0697674 L9.53488372,57.2093023 M71.5116279,42.9069767 L33.372093,81.0465116 M28.6046512,42.9069767 L66.744186,81.0465116">
                            </path>
                          </g>
                        </g>
                      </g>
                    </svg>
          <?php endif; ?>
        
        
        </a></div>
        <div class="assets Header_head-swiper__37Fg8">
          <nav class="assets Header_head-info__17tgL">
            <div class="assets ">
              <div class="assets Header_meta__YYzbP"></div>
              <div class="assets Header_title__EwaWq"></div>
            </div>
          </nav>
          <nav class="assets head-menu Header_head-menu__ofiV5" id="Header_head-menu__ofiV5">
            <div class="has-child"><a href="<?php Helper::options()->siteUrl()?>"><i class="fa fa-dot-circle"></i><span>源</span></a>
                <div class="sub-menu">
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                  <a href="<?php $pages->permalink(); ?>"><span><?php $pages->title(); ?></span></a>
                <?php endwhile; ?>
                </div>
            </div>
            <div class="has-child"><a href="#"><i class="fa fa-book"></i><span>文</span></a>
                <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                <?php if($category->have()): ?>
                  <div class="sub-menu">
                <?php while ($category->next()): ?>
                  <a href="<?php $category->permalink(); ?>"><span><?php $category->name(); ?></span></a>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            </div>
            <!--
            <div class="menu-link"><a href="#"><i class="fa fa-feather-alt"></i><span>记</span></a></div>
            <div class="menu-link"><a href="#"><i class="fa fa-comments"></i><span>言</span></a></div>
            <div class="has-child"><a href="#"><i class="fa fa-history"></i><span>览</span></a>
              <div class="sub-menu"><a href="#"><i class="fa fa-feather-alt"></i><span>生活</span></a><a href="#"><i class="fa fa-book-open"></i><span>博文</span></a></div>
            </div>   -->
            <div class="menu-link"><a href="<?php $this->options->FriendURL();?>"><i class="fa fa-user-friends"></i><span>友</span></a></div>
          </nav>
        </div>
        
        <nav class="head-social"><a title="GitHub" href="<?php $this->options->HeaderGitHub(); ?>"><svg aria-hidden="true" focusable="false"
            data-prefix="fab" data-icon="github" class="svg-inline--fa fa-github fa-w-16 " role="img"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
            <path fill="currentColor"
                d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
            </path>
        </svg></a><a title="QQ" href="<?php $this->options->HeaderQQ(); ?>"><svg aria-hidden="true"
            focusable="false" data-prefix="fab" data-icon="qq" class="svg-inline--fa fa-qq fa-w-14 " role="img"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor"
                d="M433.754 420.445c-11.526 1.393-44.86-52.741-44.86-52.741 0 31.345-16.136 72.247-51.051 101.786 16.842 5.192 54.843 19.167 45.803 34.421-7.316 12.343-125.51 7.881-159.632 4.037-34.122 3.844-152.316 8.306-159.632-4.037-9.045-15.25 28.918-29.214 45.783-34.415-34.92-29.539-51.059-70.445-51.059-101.792 0 0-33.334 54.134-44.859 52.741-5.37-.65-12.424-29.644 9.347-99.704 10.261-33.024 21.995-60.478 40.144-105.779C60.683 98.063 108.982.006 224 0c113.737.006 163.156 96.133 160.264 214.963 18.118 45.223 29.912 72.85 40.144 105.778 21.768 70.06 14.716 99.053 9.346 99.704z">
            </path>
        </svg></a>
          <?php $this->options->HeaderFourHTML(); ?>
        <a href="https://travellings.now.sh/" target="_blank" title="开往">
        <svg aria-hidden="true"
            focusable="false" data-prefix="fas" data-icon="route" class="svg-inline--fa fa-route fa-w-16 " role="img"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M416 320h-96c-17.6 0-32-14.4-32-32s14.4-32 32-32h96s96-107 96-160-43-96-96-96-96 43-96 96c0 25.5 22.2 63.4 45.3 96H320c-52.9 0-96 43.1-96 96s43.1 96 96 96h96c17.6 0 32 14.4 32 32s-14.4 32-32 32H185.5c-16 24.8-33.8 47.7-47.3 64H416c52.9 0 96-43.1 96-96s-43.1-96-96-96zm0-256c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zM96 256c-53 0-96 43-96 96s96 160 96 160 96-107 96-160-43-96-96-96zm0 128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z">
            </path>
        </svg>
        </a>
        </nav>
      
      </header>
