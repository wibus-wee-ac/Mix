<div class="assets news-item" style="opacity: 1; transform: translate(0px, 0px);">
              <div class="assets news-head"><!--源：rgb(59, 14,163)-->
                <h3 class="assets title" style="background-color: rgb(<?php echo mt_rand(5, 255); ?>, <?php echo mt_rand(5, 255); ?>, <?php echo mt_rand(5, 255); ?>);"><svg aria-hidden="true"
                    focusable="false" data-prefix="fas" data-icon="book-open"
                    class="svg-inline--fa fa-book-open fa-w-18 SectionNews_icon__w_rh8" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path fill="currentColor"
                      d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z">
                    </path>
                  </svg>最新博文</h3>
                <h3 class="assets more" style="background-color: rgb(<?php echo mt_rand(50, 255); ?>, <?php echo mt_rand(50, 255); ?>, <?php echo mt_rand(50, 255); ?>);"><a class="assets"
                    href="<?php $this->options->MoreArticle(); ?>"><svg aria-hidden="true" focusable="false" data-prefix="fas"
                      data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10 " role="img"
                      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                      <path fill="currentColor"
                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                      </path>
                    </svg></a></h3>
              </div>
              <div class="assets news-body">
                <div class="assets row s">

                <?php $this->widget('Widget_Archive@indexa', 'pageSize=4&type=category', 'slug=article')->to($new); ?>
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