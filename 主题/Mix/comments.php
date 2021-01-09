<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>

<?php } ?>

</br>
</br>

<?php if($this->allow('comment')): ?>
<article class="Comment_wrap__2X4SZ">
    <h1>亲亲留个评论再走呗</h1>
    <div>
        <div class="Comment_comment-box-head__3nTxd" method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" >

        <span class="Input_input-wrap__QJfMh">
                <div class="Input_prefix-wrap__3SjsT"><svg aria-hidden="true" focusable="false" data-prefix="far"
                        data-icon="user" class="svg-inline--fa fa-user fa-w-14 " role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z">
                        </path>
                    </svg></div>
                <div class="Input_border__1txS9"><svg>
                        <rect  height="26" width="205" class="Input_rect__S3k0K"
                            style="stroke-dasharray: 462px; stroke-dashoffset: 462px;"></rect>
                    </svg></div><?php _e('称呼'); ?><input for="author" type="text" placeholder="" required name="author" id="author" class="Input_input__3cq_w text"
                    value="<?php $this->remember('author'); ?>">
            </span><span class="Input_input-wrap__QJfMh">
                <div class="Input_prefix-wrap__3SjsT"><svg aria-hidden="true" focusable="false" data-prefix="far"
                        data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16 " role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z">
                        </path>
                    </svg></div>
                <div class="Input_border__1txS9"><svg>
                        <rect height="26" width="204" class="Input_rect__S3k0K"
                            style="stroke-dasharray: 460px; stroke-dashoffset: 460px;"></rect>
                    </svg></div><?php _e('Email'); ?><input placeholder="" name="mail" required class="Input_input__3cq_w text type="email" id="mail""
                    value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />>
            </span><span class="Input_input-wrap__QJfMh">
                <div class="Input_prefix-wrap__3SjsT"><svg aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="globe-asia" class="svg-inline--fa fa-globe-asia fa-w-16 " role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                        <path fill="currentColor"
                            d="M248 8C111.03 8 0 119.03 0 256s111.03 248 248 248 248-111.03 248-248S384.97 8 248 8zm-11.34 240.23c-2.89 4.82-8.1 7.77-13.72 7.77h-.31c-4.24 0-8.31 1.69-11.31 4.69l-5.66 5.66c-3.12 3.12-3.12 8.19 0 11.31l5.66 5.66c3 3 4.69 7.07 4.69 11.31V304c0 8.84-7.16 16-16 16h-6.11c-6.06 0-11.6-3.42-14.31-8.85l-22.62-45.23c-2.44-4.88-8.95-5.94-12.81-2.08l-19.47 19.46c-3 3-7.07 4.69-11.31 4.69H50.81C49.12 277.55 48 266.92 48 256c0-110.28 89.72-200 200-200 21.51 0 42.2 3.51 61.63 9.82l-50.16 38.53c-5.11 3.41-4.63 11.06.86 13.81l10.83 5.41c5.42 2.71 8.84 8.25 8.84 14.31V216c0 4.42-3.58 8-8 8h-3.06c-3.03 0-5.8-1.71-7.15-4.42-1.56-3.12-5.96-3.29-7.76-.3l-17.37 28.95zM408 358.43c0 4.24-1.69 8.31-4.69 11.31l-9.57 9.57c-3 3-7.07 4.69-11.31 4.69h-15.16c-4.24 0-8.31-1.69-11.31-4.69l-13.01-13.01a26.767 26.767 0 0 0-25.42-7.04l-21.27 5.32c-1.27.32-2.57.48-3.88.48h-10.34c-4.24 0-8.31-1.69-11.31-4.69l-11.91-11.91a8.008 8.008 0 0 1-2.34-5.66v-10.2c0-3.27 1.99-6.21 5.03-7.43l39.34-15.74c1.98-.79 3.86-1.82 5.59-3.05l23.71-16.89a7.978 7.978 0 0 1 4.64-1.48h12.09c3.23 0 6.15 1.94 7.39 4.93l5.35 12.85a4 4 0 0 0 3.69 2.46h3.8c1.78 0 3.35-1.18 3.84-2.88l4.2-14.47c.5-1.71 2.06-2.88 3.84-2.88h6.06c2.21 0 4 1.79 4 4v12.93c0 2.12.84 4.16 2.34 5.66l11.91 11.91c3 3 4.69 7.07 4.69 11.31v24.6z">
                        </path>
                    </svg></div>
                <div class="Input_border__1txS9"><svg>
                        <rect height="26" width="205" class="Input_rect__S3k0K"
                            style="stroke-dasharray: 462px; stroke-dashoffset: 462px;"></rect>
                    </svg></div><?php _e('网站'); ?><input placeholder=" " type="url" name="url" id="url" class="Input_input__3cq_w text"
                    value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />>
            </span></div>
            
            <span class="Input_input-wrap__QJfMh">
            <div class="Input_border__1txS9"><svg>
                    <rect height="86" width="642" class="Input_rect__S3k0K"
                        style="stroke-dasharray: 1456px; stroke-dashoffset: 1456px;"></rect>
                </svg></div><?php _e('内容'); ?><textarea id="textarea" maxlength="500" rows="4" required placeholder="嘿 ︿(￣︶￣)︿, 留个评论好不好嘛~"
                class="Input_input__3cq_w textarea"><?php $this->remember('text'); ?></textarea>
        </span>
        <div class="Comment_actions-wrapper__3TQ0b">
            <div class="Comment_emoji-wrapper__1BBa9">
                <div class="Comment_emojis__34oJB"><button class="Comment_emoji__1MOwZ">(つд⊂)</button><button
                        class="Comment_emoji__1MOwZ"> (⑉･̆⌓･̆⑉)</button><button
                        class="Comment_emoji__1MOwZ">(°ー°〃)</button><button class="Comment_emoji__1MOwZ">(๑•̀ㅂ•́)
                        ✧</button><button class="Comment_emoji__1MOwZ">(&gt;▽&lt;)</button><button
                        class="Comment_emoji__1MOwZ">(๑¯◡¯๑)</button><button
                        class="Comment_emoji__1MOwZ">Ծ‸Ծ</button><button class="Comment_emoji__1MOwZ">
                        ♫.(◕∠◕).♫</button><button class="Comment_emoji__1MOwZ"> | •́ ▾ •̀ |</button><button
                        class="Comment_emoji__1MOwZ"> | •́ ▾ •̀ |</button><button class="Comment_emoji__1MOwZ"> 〳 ° ▾ °
                        〵</button><button class="Comment_emoji__1MOwZ"> (^・ω・^ )</button><button
                        class="Comment_emoji__1MOwZ"> ʕ •̀ o •́ ʔ</button><button class="Comment_emoji__1MOwZ"> ⋋╏ ❛ ◡ ❛
                        ╏⋌</button><button class="Comment_emoji__1MOwZ">(๑´ㅂ`๑) </button><button
                        class="Comment_emoji__1MOwZ">ლ(╹◡╹ლ)</button><button class="Comment_emoji__1MOwZ">
                        (・∀・)</button><button class="Comment_emoji__1MOwZ">o(￣ヘ￣o＃)</button><button
                        class="Comment_emoji__1MOwZ">_(:з」∠)_</button><button
                        class="Comment_emoji__1MOwZ">(●’ω`●）</button><button class="Comment_emoji__1MOwZ">(•౪•
                        )</button><button class="Comment_emoji__1MOwZ">(´･ω･`) </button><button
                        class="Comment_emoji__1MOwZ">(๑˘ ₃˘๑) </button><button
                        class="Comment_emoji__1MOwZ">(o´ω`o)</button><button class="Comment_emoji__1MOwZ">(´･ω･`)
                    </button><button class="Comment_emoji__1MOwZ">( •̀ .̫ •́ )✧</button><button
                        class="Comment_emoji__1MOwZ">(๑•̀ㅂ•́)و✧</button></div>
            </div>
            <div class="Comment_submit-wrapper__3w3M2">
                <button type="submit" class="btn yellow submit"><?php _e('提交评论'); ?></button>
            </div>
        </div>
    </div><span id="comment-anchor"></span>
    <div class="Comment_empty__1rWr1" style="min-height: 400px;"><svg version="1.1" x="0px" y="0px" width="59.227px"
            height="59.227px" viewBox="0 0 59.227 59.227" style="fill: var(--shizuku-text-color);">
            <g>
                <g>
                    <path
                        d="M51.586,10.029c-0.333-0.475-0.897-0.689-1.449-0.607c-0.021-0.005-0.042-0.014-0.063-0.017L27.469,6.087 c-0.247-0.037-0.499-0.01-0.734,0.076L8.63,12.799c-0.008,0.003-0.015,0.008-0.023,0.011c-0.019,0.008-0.037,0.02-0.057,0.027 c-0.099,0.044-0.191,0.096-0.276,0.157c-0.026,0.019-0.051,0.038-0.077,0.059c-0.093,0.076-0.178,0.159-0.249,0.254 c-0.004,0.006-0.01,0.009-0.014,0.015L0.289,23.78c-0.293,0.401-0.369,0.923-0.202,1.391c0.167,0.469,0.556,0.823,1.038,0.947 l6.634,1.713v16.401c0,0.659,0.431,1.242,1.062,1.435l24.29,7.422c0.008,0.004,0.017,0.001,0.025,0.005 c0.13,0.036,0.266,0.059,0.402,0.06c0.003,0,0.007,0.002,0.011,0.002l0,0h0.001c0.143,0,0.283-0.026,0.423-0.067 c0.044-0.014,0.085-0.033,0.13-0.052c0.059-0.022,0.117-0.038,0.175-0.068l17.43-9.673c0.477-0.265,0.772-0.767,0.772-1.312 V25.586l5.896-2.83c0.397-0.19,0.69-0.547,0.802-0.973c0.111-0.427,0.03-0.88-0.223-1.241L51.586,10.029z M27.41,9.111 l17.644,2.59L33.35,17.143l-18.534-3.415L27.41,9.111z M9.801,15.854l21.237,3.914l-6.242,9.364l-20.78-5.365L9.801,15.854z M10.759,43.122V28.605l14.318,3.697c0.125,0.031,0.25,0.048,0.375,0.048c0.493,0,0.965-0.244,1.248-0.668l5.349-8.023v25.968 L10.759,43.122z M49.479,41.1l-14.431,8.007V25.414l2.635,5.599c0.171,0.361,0.479,0.641,0.854,0.773 c0.163,0.06,0.333,0.087,0.502,0.087c0.223,0,0.444-0.05,0.649-0.146l9.789-4.698L49.479,41.1L49.479,41.1z M39.755,28.368 l-4.207-8.938L49.85,12.78l5.634,8.037L39.755,28.368z">
                    </path>
                </g>
            </g>
        </svg>嘿, 小可爱, 说点什么呢?</div>
    <div style="text-align: center;"></div>
</article>
<?php endif; ?>