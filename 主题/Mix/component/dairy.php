<div class="assets news-item" style="opacity: 1; transform: translate(0px, 0px);">
              <div class="assets news-head">
                <h3 class="assets title" style="background-color: rgb(<?php echo mt_rand(5, 255); ?>, <?php echo mt_rand(5, 255); ?>, <?php echo mt_rand(5, 255); ?>);"><svg aria-hidden="true"
                    focusable="false" data-prefix="fas" data-icon="pencil-alt"
                    class="svg-inline--fa fa-pencil-alt fa-w-16 SectionNews_icon__w_rh8" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                      d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z">
                    </path>
                  </svg>随便写写</h3>
                  <?php $this->widget('Widget_Archive@indexd', 'pageSize=1&type=category', 'slug=dairy')->to($newdairy); ?>
                  <?php while ($newdairy->next()): ?><!--155.163.8-->
                  <h3 class="jsx-358401028 more" style="background-color: rgb(<?php echo mt_rand(50, 255); ?>, <?php echo mt_rand(50, 255); ?>, <?php echo mt_rand(50, 255); ?>);">
                  <a class="jsx-358401028" href="<?php $newdairy->permalink(); ?>">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
                  </a>
                  </h3>
                    <?php endwhile; ?>
              </div>
              
              <div class="assets news-body">
                <div class="assets row s">

                <?php $this->widget('Widget_Archive@indexb', 'pageSize=4&type=category', 'slug=dairy')->to($new); ?>
                <?php while ($new->next()): ?>
                  <div class="col-6 col-m-3"><a class="SectionNews_news-article__3ttyR"
                      href="<?php $new->permalink(); ?>">
                      <div class="SectionNews_card-container__1nays">
                        <div class="SectionNews_card-cover-wrap__1DHPb">
                          <div>
                            <div style="position: relative; max-width: 100%; margin: auto;">
                              <div class="lazyload-image"><img src="<?php Content::bphoto(); ?>"
                                  alt="photo"></div>
                              <div class="placeholder-image hide"
                                style="max-width: 100%; position: absolute; filter: brightness(1.3); z-index: -1;">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="SectionNews_card-header__2M67p"></div>
                        <div class="SectionNews_card-body__1Tj-4">
                          <div class="SectionNews_text-mask__21UEm"><span><?php $new->title(); ?></span></div>
                        </div>
                        <div class="SectionNews_text-shade__QzdgY"></div>
                      </div>
                    </a>
                  </div>
                <?php endwhile; ?>


                </div>
              </div>
            </div>