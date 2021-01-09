<?php
/*
 * 解析MoreJSON信息
 * Author: Wibus
 * 相关变量：$MoreJsonName $MoreJsonLink $MoreJsonMore
 * Date：2020.12.13
 */
//$morejson = $this->options->MoreJSON; //获取设置选项
$MoreJson = json_decode($this->options->MoreJSON); //对json转存为数组
$MoreJsonName1 = $MoreJson->{'Name1'};
$MoreJsonLink1 = $MoreJson->{'Link1'};
$MoreJsonMore1 = $MoreJson->{'More1'};
$MoreJsonName2 = $MoreJson->{'Name2'};
$MoreJsonLink2 = $MoreJson->{'Link2'};
$MoreJsonMore2 = $MoreJson->{'More2'};
$MoreJsonName3 = $MoreJson->{'Name3'};
$MoreJsonLink3 = $MoreJson->{'Link3'};
$MoreJsonMore3 = $MoreJson->{'More3'};
$MoreJsonName4 = $MoreJson->{'Name4'};
$MoreJsonLink4 = $MoreJson->{'Link4'};
$MoreJsonMore4 = $MoreJson->{'More4'};

?>
<div class="assets news-item" style="opacity: 1; transform: translate(0px, 0px);">
              <div class="assets news-head">
                <h3 class="assets title" style="background-color: rgb(<?php echo mt_rand(50, 255); ?>, <?php echo mt_rand(50, 255); ?>, <?php echo mt_rand(50, 255); ?>);"><svg aria-hidden="true"
                    focusable="false" data-prefix="fas" data-icon="heart"
                    class="svg-inline--fa fa-heart fa-w-16 SectionNews_icon__w_rh8" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                      d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z">
                    </path>
                  </svg>了解更多</h3>
              </div>
              <div class="assets news-body">
                <div class="assets row s">
                 <div class="col-6 col-m-3" style="margin-top: 2rem;">
                  <a class="SectionNews_news-article__3ttyR" href="<?php echo $MoreJsonLink1; ?>">
                   <div class="SectionNews_card-container__1nays">
                    <div class="SectionNews_card-cover-wrap__1DHPb">
                     <div>
                      <div style="position: relative; max-width: 100%; margin: auto;">
                       <div class="lazyload-image">
                       <img src="<?php Content::bphoto(); ?>" />
                       </div>
                       <div class="placeholder-image hide" style="max-width: 100%; position: absolute; filter: brightness(1.3); z-index: -1;"></div>
                      </div>
                     </div>
                    </div>
                    <div class="SectionNews_card-header__2M67p"></div>
                    <div class="SectionNews_card-title__3k9WJ">
                     <h3><?php echo $MoreJsonName1; ?></h3>
                    </div>
                    <div class="SectionNews_card-body__1Tj-4">
                     <span><?php echo $MoreJsonMore1; ?></span>
                    </div>
                    <div class="SectionNews_text-shade__QzdgY"></div>
                   </div></a>
                 </div>
                 <div class="col-6 col-m-3" style="margin-top: 2rem;">
                  <a class="SectionNews_news-article__3ttyR" href="<?php echo $MoreJsonLink2; ?>">
                   <div class="SectionNews_card-container__1nays">
                    <div class="SectionNews_card-cover-wrap__1DHPb">
                     <div>
                      <div style="position: relative; max-width: 100%; margin: auto;">
                       <div class="lazyload-image">
                       <img src="<?php Content::bphoto(); ?>" />
                       </div>
                       <div class="placeholder-image hide" style="max-width: 100%; position: absolute; filter: brightness(1.3); z-index: -1;"></div>
                      </div>
                     </div>
                    </div>
                    <div class="SectionNews_card-header__2M67p"></div>
                    <div class="SectionNews_card-title__3k9WJ">
                     <h3><?php echo $MoreJsonName2; ?></h3>
                    </div>
                    <div class="SectionNews_card-body__1Tj-4">
                     <span><?php echo $MoreJsonMore2; ?></span>
                    </div>
                    <div class="SectionNews_text-shade__QzdgY"></div>
                   </div></a>
                 </div>
                 <div class="col-6 col-m-3" style="margin-top: 2rem;">
                  <a class="SectionNews_news-article__3ttyR" href="<?php echo $MoreJsonLink3; ?>">
                   <div class="SectionNews_card-container__1nays">
                    <div class="SectionNews_card-cover-wrap__1DHPb">
                     <div>
                      <div style="position: relative; max-width: 100%; margin: auto;">
                       <div class="lazyload-image">
                       <img src="<?php Content::bphoto(); ?>" />
                       </div>
                       <div class="placeholder-image hide" style="max-width: 100%; position: absolute; filter: brightness(1.3); z-index: -1;"></div>
                      </div>
                     </div>
                    </div>
                    <div class="SectionNews_card-header__2M67p"></div>
                    <div class="SectionNews_card-title__3k9WJ">
                     <h3><?php echo $MoreJsonName3; ?></h3>
                    </div>
                    <div class="SectionNews_card-body__1Tj-4">
                     <span><?php echo $MoreJsonMore3; ?></span>
                    </div>
                    <div class="SectionNews_text-shade__QzdgY"></div>
                   </div></a>
                 </div>
                 <div class="col-6 col-m-3" style="margin-top: 2rem;">
                  <a class="SectionNews_news-article__3ttyR" href="<?php echo $MoreJsonLink4; ?>">
                   <div class="SectionNews_card-container__1nays">
                    <div class="SectionNews_card-cover-wrap__1DHPb">
                     <div>
                      <div style="position: relative; max-width: 100%; margin: auto;">
                       <div class="lazyload-image">
                       <img src="<?php Content::bphoto(); ?>" />
                       </div>
                       <div class="placeholder-image hide" style="max-width: 100%; position: absolute; filter: brightness(1.3); z-index: -1;"></div>
                      </div>
                     </div>
                    </div>
                    <div class="SectionNews_card-header__2M67p"></div>
                    <div class="SectionNews_card-title__3k9WJ">
                     <h3><?php echo $MoreJsonName4; ?></h3>
                    </div>
                    <div class="SectionNews_card-body__1Tj-4">
                     <span><?php echo $MoreJsonMore4; ?></span>
                    </div>
                    <div class="SectionNews_text-shade__QzdgY"></div>
                   </div></a>
                 </div>
                </div>
               </div>
            </div>