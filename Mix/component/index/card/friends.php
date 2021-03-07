<div class="news-item" style="opacity: 1; transform: translate(0px, 0px);">
   <div class="news-head">
    <h3 class="title" style="background-color: rgb(19, 142, 8);">
     <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" class="svg-inline--fa fa-users fa-w-20 SectionNews_icon__w_rh8" role="img" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
      <path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path>
     </svg>朋友们</h3>
    <h3 class="more" style="background-color: rgb(19, 142, 8);"><a class="" href="<?php $this->options->FriendURL() ?>" rel="noopener">
      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10 " role="img" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 320 512">
       <path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
      </svg></a></h3>
   </div>
   <div class="news-body">
    <div class="row s">
     <div class="SectionNews_friends-wrap__3pfJV">

<?php 
Links_Plugin::output('
<div class="SectionNews_avatar-item__2j9Yd">
<div class="Avatar_avatar-wrap__cWFM_">
 <a class="Avatar_avatar__zmMlJ" href="{url}"  target="_blank" style="" rel="noreferrer">
  <div class="Avatar_image__1r-Od" style="background-image: url({image}); opacity: 1;"></div></a>
</div>
<span class="SectionNews_avatar-name__3syRf">{name}</span>
</div>
')

?>
     </div>
    </div>
   </div>
  </div>