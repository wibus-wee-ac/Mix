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
    color: #664238;
  }

  @media(min-width: 898px){
    header{
        display: flex;
        justify-content: space-between;
    }
    .head-logo{
        margin-left: 150px;
    }
    .Header_head-swiper__37Fg8 {
        margin-right: 150px;
    }
}
.head-logo{
    background: transparent!important;
}
.Header_title__1THMF {
    display: inline-block;
    font-weight: 500;
    font-size: 1.25rem;
    line-height: 1.75rem;
    margin-top: 0;
    margin-left: 1rem;
    position: relative;
}
.head-logo svg {
    height: 2.5em;
}
.head-btn{
    cursor: pointer;
    display: block;
    padding-top: 1rem;
    padding-bottom: 1rem;
    padding-left: 1rem;
    position: absolute;
    right: 0;
    margin-right: 10px;
    visibility: visible;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    padding: 6px;
}
.Header_drawer__iQn1p.Header_show__3R4Sq {
    -webkit-transform: translateX(0);
    transform: translateX(0);
}
.Header_drawer__iQn1p {
    background-color: var(--light-bg);
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 90;
    padding: 1.5rem;
    color: var(--light-brown);
    -webkit-transition-property: -webkit-transform;
    transition-property: -webkit-transform;
    transition-property: transform;
    transition-property: transform,-webkit-transform;
    -webkit-transition-timing-function: cubic-bezier(.4,0,.2,1);
    transition-timing-function: cubic-bezier(.4,0,.2,1);
    -webkit-transition-duration: .15s;
    transition-duration: .15s;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    width: 300px;
    max-width: 80vw;
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
}
.text-right {
    text-align: right;
}
.pb-4 {
    padding-bottom: 1rem;
}
.Header_link-section__1JFc9 {
    margin-bottom: 1rem;
}
.Header_drawer__iQn1p .Header_parent__3EA6A {
    padding-top: .5rem;
    padding-bottom: .5rem;
}
.Header_drawer__iQn1p .Header_children-wrapper__1z9Ni {
    display: grid;
    grid-template-columns: 1fr 1fr;
}
.no_none{
    display: none;
}
</style>
<header class="assets" id="header">
    <div class="jsx-685620294 head-btn" id="btn_active" style="display: flex; align-items: center; justify-content: center; padding: 1em; cursor: pointer;"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list-ul" class="svg-inline--fa fa-list-ul fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M48 48a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm448 16H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path></svg></div>
    
        <div class="assets head-logo"><a id="headnav-a" href="<?php Helper::options()->siteUrl()?>">
        
        <?php if($this->options->HeadNavPhoto): ?>
        <?php $this->options->HeadNavPhoto(); ?><h1 class="Header_title__1THMF Header_title__EwaWq global-title"><?php $this->options->title(); ?></h1>
        <?php else: ?>
<svg height="200px" viewBox="0 0 200 200" version="1.1"><desc>Created with Sketch.</desc><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="forest" fill="currentColor" fill-rule="nonzero"><path d="M116.799219,176.953125 C112.484375,176.953125 108.986719,180.450781 108.986719,184.765625 L108.986719,192.1875 C108.986719,196.502344 112.484375,200 116.799219,200 C121.114062,200 124.611719,196.502344 124.611719,192.1875 L124.611719,184.765625 C124.611719,180.450781 121.114063,176.953125 116.799219,176.953125 Z" id="Path"></path><path d="M121.456641,150.248047 C121.298828,150.158203 108.089453,142.472656 101.778125,128.767188 C106.058594,127.733594 109.462109,126.055078 112.442578,124.584766 C115.008203,123.319531 116.671094,120.749609 116.787109,117.891406 C116.903125,115.033203 115.441797,112.336328 112.986719,110.867578 C108.091406,107.937891 96.6117187,99.3179688 91.234375,88.9808594 C94.3324219,88.1222656 97.3414062,86.940625 100.255469,85.734375 C102.819922,84.6730469 104.628906,82.3304688 105.007422,79.5808594 C105.385938,76.83125 104.276953,74.0875 102.094531,72.3722656 C82.3632812,56.8691406 70.0417969,20.1820313 69.9210937,19.8171875 C68.8640625,16.6136719 65.8710938,14.4558594 62.5019531,14.4558594 C62.4839844,14.4558594 62.465625,14.4558594 62.4472656,14.4558594 C59.05625,14.4792969 56.0664063,16.690625 55.0484375,19.925 C54.934375,20.2878906 43.3839844,56.3890625 22.3355469,71.8246094 C20.075,73.4824219 18.8757813,76.2242188 19.1933594,79.0097656 C19.5109375,81.7949219 21.2964844,84.196875 23.8722656,85.303125 C26.1265625,86.2714844 29.5851563,87.7554688 34.3464844,89.0640625 C29.0214844,98.8472656 17.2527344,107.819922 12.2683594,110.952734 C9.7640625,112.517969 8.35625,115.360938 8.63007813,118.301563 C8.90390625,121.242188 10.8117188,123.776953 13.5617188,124.852734 C13.9058594,124.9875 14.2785156,125.1375 14.6828125,125.3 C16.8089844,126.154297 19.7445313,127.332031 23.6902344,128.501953 C17.2066406,141.350391 3.68632813,150.395703 3.53671875,150.494141 C1.09140625,152.094922 -0.25625,154.926563 0.044140625,157.833594 C0.34453125,160.740625 2.2421875,163.237109 4.96328125,164.303906 C5.76640625,164.61875 23.6132813,171.474609 55.471875,172.521875 L55.471875,192.1875 C55.471875,196.502344 58.9695313,200 63.284375,200 C67.5992187,200 71.096875,196.502344 71.096875,192.1875 L71.096875,172.544531 C103.353125,171.572656 119.956641,164.517578 120.696484,164.196094 C123.407422,163.016797 125.221094,160.408984 125.382422,157.457031 C125.542578,154.504688 124.023438,151.714844 121.456641,150.248047 Z M63.6742188,157.03125 C46.6414063,157.03125 33.3425781,155.194922 24.325,153.367578 C29.7734375,147.926953 35.75625,140.533203 39.3648438,131.730859 C44.5152344,132.389453 50.4929688,132.8125 57.4242188,132.8125 C61.7390625,132.8125 65.2367188,129.314844 65.2367188,125 C65.2367188,120.685156 61.7390625,117.1875 57.4242188,117.1875 C46.7472656,117.1875 38.8265625,116.116406 32.8878906,114.769531 C33.4640625,114.256641 34.0460937,113.726953 34.63125,113.180859 C42.2988281,106.020703 47.5574219,98.8085938 50.3394531,91.6605469 C51.3,91.7195313 52.2839844,91.7652344 53.2945313,91.7941406 C57.6179688,91.9210938 61.2035156,88.5207031 61.3269531,84.2082031 C61.45,79.8949219 58.0535156,76.2988281 53.740625,76.1757813 C49.2144531,76.0464844 45.3546875,75.5386719 42.0863281,74.8628906 C51.1160156,64.9648438 57.9273437,52.8929688 62.5585937,43.0527344 C67.1378906,52.8117188 73.746875,64.7949219 82.1886719,74.6710938 C81.9644531,74.6675781 81.74375,74.6566406 81.5277344,74.6382813 C79.1414062,74.4355469 76.7910156,75.3363281 75.1546875,77.0871094 C73.5183594,78.8375 72.7753906,81.2421875 73.1398437,83.6105469 C75.0921875,96.3007813 83.7679687,106.876563 91.5785156,114.065234 C89.2605469,114.0125 87.06875,114.98125 85.5433594,116.714844 C83.9519531,118.523438 83.2839844,120.964844 83.7328125,123.33125 C86.2589844,136.650391 93.8433594,146.823047 100.754297,153.641797 C92.2726562,155.367188 79.8890625,157.03125 63.6742188,157.03125 Z" id="Shape"></path><path d="M199.920703,162.187891 C199.623438,160.078516 198.473047,158.178125 196.74375,156.933203 C196.677734,156.885547 190.046094,152.078516 183.367188,144.459375 C178.680469,139.112891 175.16875,133.808203 172.869141,128.615234 C177.176953,127.299219 180.334766,125.896484 182.855078,124.776563 C183.779688,124.365625 184.578125,124.011328 185.239063,123.752344 C187.985938,122.677344 189.889453,120.144141 190.166016,117.207422 C190.442578,114.270703 189.037891,111.426172 186.539844,109.857031 C180.508203,106.06875 165.928516,94.9003906 160.170313,82.8882813 C165.975,81.6109375 170.135938,80.0996094 173.450781,78.6757813 C176.026953,77.5691406 177.8125,75.1675781 178.130078,72.3824219 C178.447656,69.596875 177.248438,66.8550781 174.987891,65.1972656 C150.69375,47.3816406 137.426172,5.89023438 137.296484,5.47773438 C136.282422,2.23945312 133.294141,0.02578125 129.900781,0 C129.880469,0 129.860938,0 129.840625,0 C126.471875,0 123.479297,2.1609375 122.422266,5.36484375 C122.345703,5.59726563 114.594141,28.8386719 101.137891,48.2902344 C98.6832031,51.8386719 99.5699219,56.7050781 103.118359,59.1597656 C106.666016,61.6144531 111.532813,60.7277344 113.987891,57.1796875 C120.606641,47.6113281 125.908984,37.3730469 129.771094,28.9074219 C135.158203,40.7210938 143.499219,55.9507812 154.835547,68.0292969 C148.182031,69.3046875 138.466406,70.365625 124.221094,70.365625 C119.90625,70.365625 116.408594,73.8632812 116.408594,78.178125 C116.408594,82.4929687 119.90625,85.990625 124.221094,85.990625 C131.989844,85.990625 138.586719,85.7003906 144.237891,85.2101562 C147.194141,93.6328125 153.265625,102.16875 162.363672,110.664453 C163.722266,111.933203 165.067578,113.123437 166.365234,114.225781 C160.423047,115.830469 152.078516,117.127344 139.455469,117.127344 C135.140625,117.127344 131.642969,120.625 131.642969,124.939844 C131.642969,129.254687 135.140625,132.752344 139.455469,132.752344 C146.397656,132.752344 152.275391,132.379297 157.298828,131.778516 C160.196094,139.490625 164.986719,147.194531 171.617578,154.758984 C173.749219,157.191406 175.869141,159.373437 177.836328,161.269531 C171.480469,162.880469 160.966797,164.453125 144.142969,164.453125 C139.828125,164.453125 136.330469,167.950781 136.330469,172.265625 L136.330469,192.1875 C136.330469,196.502344 139.828125,200 144.142969,200 C148.457813,200 151.955469,196.502344 151.955469,192.1875 L151.955469,179.966016 C166.112109,179.546484 177.524219,177.948828 185.952344,175.201562 C193.906641,172.608203 197.119922,169.648438 198.327734,168.114453 C199.645703,166.441016 200.217969,164.297266 199.920703,162.187891 Z" id="Path"></path></g></g></svg>
<h1 class="Header_title__1THMF Header_title__EwaWq global-title"><?php $this->options->title(); ?></h1>
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
            <div class="menu-link"><a href="<?php $this->options->FriendURL();?>"><i class="fa fa-users"></i><span>友</span></a></div>
                        <?php
              $hideHomeItem = false;
              if(!empty(Typecho_Widget::widget('Widget_Options')->headnavItems)){
                  $json = '['.Utils::remove_last_comma(Typecho_Widget::widget('Widget_Options')->headnavItems).']';
                  
                  $headnavItems = json_decode($json);
                  $headnavItemsOutput = "";
                  foreach ($headnavItems as $headnavItem){

                      @$itemName = $headnavItem->name;
                      @$itemStatus = $headnavItem->status;

                      @$itemSub = $headnavItem->sub;

                      if ($itemName === 'home' && strtoupper($itemStatus) === 'HIDE'){
                          $hideHomeItem = true;
                          continue;//本次循环结束，不再执行下面内容
                      }

                      $haveSub = false;
                      $subListHtml = "";
//                      print_r($itemSub);
                      if (is_array($itemSub)){
                          $haveSub = true;
                          $subListHtml .= '<div class="sub-menu">';
                          foreach ($itemSub as $subItem){
                              $subListHtml .= Content::returnHeadItem($subItem,false,"" ,'yes');
                          }
                          $subListHtml .= '</div>';
                      }

                      $headnavItemsOutput .= Content::returnHeadItem($headnavItem,$haveSub,$subListHtml);
                  }
              }
              ?>
              <?php echo @$headnavItemsOutput;?>
          </nav>
        </div>
        
      <div id="headerr" class="Header_drawer__iQn1p global-drawer"><div id="close" class="pb-4 text-right"><span class="p-4 inline-block -mr-5 -mt-4"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg></span></div><div class="Header_link-section__1JFc9 global-link-section"><a href="/"><div class="Header_parent__3EA6A global-parent"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="dot-circle" class="svg-inline--fa fa-dot-circle fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"></path></svg><span>源</span></div></a><div class="Header_children-wrapper__1z9Ni global-children-wrapper"><a href="/about"><div class="Header_children__2ZydX global-children"><span>关于</span></div></a><a href="/message"><div class="Header_children__2ZydX global-children"><span>留言</span></div></a><a href="/stack"><div class="Header_children__2ZydX global-children"><span>学习成果</span></div></a><a href="/thanks"><div class="Header_children__2ZydX global-children"><span>感谢信</span></div></a></div></div><div class="Header_link-section__1JFc9 global-link-section"><a href="/posts"><div class="Header_parent__3EA6A global-parent"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="glasses" class="svg-inline--fa fa-glasses fa-w-18 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M574.1 280.37L528.75 98.66c-5.91-23.7-21.59-44.05-43-55.81-21.44-11.73-46.97-14.11-70.19-6.33l-15.25 5.08c-8.39 2.79-12.92 11.86-10.12 20.24l5.06 15.18c2.79 8.38 11.85 12.91 20.23 10.12l13.18-4.39c10.87-3.62 23-3.57 33.16 1.73 10.29 5.37 17.57 14.56 20.37 25.82l38.46 153.82c-22.19-6.81-49.79-12.46-81.2-12.46-34.77 0-73.98 7.02-114.85 26.74h-73.18c-40.87-19.74-80.08-26.75-114.86-26.75-31.42 0-59.02 5.65-81.21 12.46l38.46-153.83c2.79-11.25 10.09-20.45 20.38-25.81 10.16-5.3 22.28-5.35 33.15-1.73l13.17 4.39c8.38 2.79 17.44-1.74 20.23-10.12l5.06-15.18c2.8-8.38-1.73-17.45-10.12-20.24l-15.25-5.08c-23.22-7.78-48.75-5.41-70.19 6.33-21.41 11.77-37.09 32.11-43 55.8L1.9 280.37A64.218 64.218 0 0 0 0 295.86v70.25C0 429.01 51.58 480 115.2 480h37.12c60.28 0 110.37-45.94 114.88-105.37l2.93-38.63h35.75l2.93 38.63C313.31 434.06 363.4 480 423.68 480h37.12c63.62 0 115.2-50.99 115.2-113.88v-70.25c0-5.23-.64-10.43-1.9-15.5zm-370.72 89.42c-1.97 25.91-24.4 46.21-51.06 46.21H115.2C86.97 416 64 393.62 64 366.11v-37.54c18.12-6.49 43.42-12.92 72.58-12.92 23.86 0 47.26 4.33 69.93 12.92l-3.13 41.22zM512 366.12c0 27.51-22.97 49.88-51.2 49.88h-37.12c-26.67 0-49.1-20.3-51.06-46.21l-3.13-41.22c22.67-8.59 46.08-12.92 69.95-12.92 29.12 0 54.43 6.44 72.55 12.93v37.54z"></path></svg><span>文</span></div></a><div class="Header_children-wrapper__1z9Ni global-children-wrapper"><a href="/category/code"><div class="Header_children__2ZydX global-children"><span>编程</span></div></a><a href="/category/play"><div class="Header_children__2ZydX global-children"><span>折腾</span></div></a><a href="/category/learn"><div class="Header_children__2ZydX global-children"><span>学习</span></div></a><a href="/category/things"><div class="Header_children__2ZydX global-children"><span>事件日志</span></div></a><a href="/category/works"><div class="Header_children__2ZydX global-children"><span>作品</span></div></a></div></div><div class="Header_link-section__1JFc9 global-link-section"><a href="/notes"><div class="Header_parent__3EA6A global-parent"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="feather-alt" class="svg-inline--fa fa-feather-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 0C460.22 3.56 96.44 38.2 71.01 287.61c-3.09 26.66-4.84 53.44-5.99 80.24l178.87-178.69c6.25-6.25 16.4-6.25 22.65 0s6.25 16.38 0 22.63L7.04 471.03c-9.38 9.37-9.38 24.57 0 33.94 9.38 9.37 24.59 9.37 33.98 0l57.13-57.07c42.09-.14 84.15-2.53 125.96-7.36 53.48-5.44 97.02-26.47 132.58-56.54H255.74l146.79-48.88c11.25-14.89 21.37-30.71 30.45-47.12h-81.14l106.54-53.21C500.29 132.86 510.19 26.26 512 0z"></path></svg><span>记</span></div></a><div class="Header_children-wrapper__1z9Ni global-children-wrapper"></div></div><div class="Header_link-section__1JFc9 global-link-section"><a href="/says"><div class="Header_parent__3EA6A global-parent"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" class="svg-inline--fa fa-comments fa-w-18 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg><span>言</span></div></a><div class="Header_children-wrapper__1z9Ni global-children-wrapper"></div></div><div class="Header_link-section__1JFc9 global-link-section"><a href="/timeline"><div class="Header_parent__3EA6A global-parent"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="history" class="svg-inline--fa fa-history fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 255.531c.253 136.64-111.18 248.372-247.82 248.468-59.015.042-113.223-20.53-155.822-54.911-11.077-8.94-11.905-25.541-1.839-35.607l11.267-11.267c8.609-8.609 22.353-9.551 31.891-1.984C173.062 425.135 212.781 440 256 440c101.705 0 184-82.311 184-184 0-101.705-82.311-184-184-184-48.814 0-93.149 18.969-126.068 49.932l50.754 50.754c10.08 10.08 2.941 27.314-11.313 27.314H24c-8.837 0-16-7.163-16-16V38.627c0-14.254 17.234-21.393 27.314-11.314l49.372 49.372C129.209 34.136 189.552 8 256 8c136.81 0 247.747 110.78 248 247.531zm-180.912 78.784l9.823-12.63c8.138-10.463 6.253-25.542-4.21-33.679L288 256.349V152c0-13.255-10.745-24-24-24h-16c-13.255 0-24 10.745-24 24v135.651l65.409 50.874c10.463 8.137 25.541 6.253 33.679-4.21z"></path></svg><span>览</span></div></a><div class="Header_children-wrapper__1z9Ni global-children-wrapper"><a href="/timeline?type=note"><div class="Header_children__2ZydX global-children"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="feather-alt" class="svg-inline--fa fa-feather-alt fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 0C460.22 3.56 96.44 38.2 71.01 287.61c-3.09 26.66-4.84 53.44-5.99 80.24l178.87-178.69c6.25-6.25 16.4-6.25 22.65 0s6.25 16.38 0 22.63L7.04 471.03c-9.38 9.37-9.38 24.57 0 33.94 9.38 9.37 24.59 9.37 33.98 0l57.13-57.07c42.09-.14 84.15-2.53 125.96-7.36 53.48-5.44 97.02-26.47 132.58-56.54H255.74l146.79-48.88c11.25-14.89 21.37-30.71 30.45-47.12h-81.14l106.54-53.21C500.29 132.86 510.19 26.26 512 0z"></path></svg><span>生活</span></div></a><a href="/timeline?type=post"><div class="Header_children__2ZydX global-children"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-open" class="svg-inline--fa fa-book-open fa-w-18 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"></path></svg><span>博文</span></div></a></div></div><div class="Header_link-section__1JFc9 global-link-section"><a href="/friends"><div class="Header_parent__3EA6A global-parent"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-friends" class="svg-inline--fa fa-user-friends fa-w-20 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zM480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48 0-61.9-50.1-112-112-112z"></path></svg><span>友</span></div></a><div class="Header_children-wrapper__1z9Ni global-children-wrapper"></div></div></div>
      <div id="dark_dark" class="no_none" ><div class="Overlay_container__1owmA" style="opacity: 1;"><div><div class="Overlay_overlay__2YOqK" style="opacity: 1;"></div></div></div></div>
      </header>
