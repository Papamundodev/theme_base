<?php
$object= get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$theme_location = $args['theme_location'] ?? "header";

?>


<?php $menu_items = \Theme_base\Base::wp_get_menu_array($theme_location);?>
<?php if(is_array($menu_items) && count($menu_items) > 0): ?>
<nav id="navmenu-<?=$theme_location?>" class="navmenu navmenu-desktop" aria-label="Menu principal">
  <ul class="navmenu-list">
    <?php foreach($menu_items as $item): ?>
      <?php if(empty($item['children'])):?>
        <li class="<?= \Theme_base\Base::get_active_class($item) ?>">
          <a class="nav-link" 
          href="<?=$item['url']?>"
          target="<?=$item['target']?>"
          rel="<?= $item['target'] === '_blank' ? 'noopener' : '' ?>"
          ><?=$item['title']?></a>
        </li>
      <?php else: ?>

        <!-- desktop dropdown -->
         <li>
          <button class="open-module nav-link" popovertarget="module-<?=$item['title']?>">
              <?=$item['title']?>
          </button>
        <div popover id="module-<?=$item['title']?>" class="module">
           <div class="module-test">
              <div class="wrapper-popover-header">
                  <button popovertarget="module-<?=$item['title']?>" popovertargetaction="hide" class="button-mobile-close-module btn">
                      <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                          <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                      </svg>
                  </button>
              </div>
              <ul class="module-content-list">
                <?php $i = 0; foreach($item['children'] as $child): ?>
                  <li  class="<?= \Theme_base\Base::get_active_class($child) ?>">
                  <a  class="nav-link"
                  href="<?=$child['url']?>"
                  title="<?=$child['title']?>"
                  target="<?=$child['target']?>"
                  rel="<?= $child['target'] === '_blank' ? 'noopener' : '' ?>"
                  ><?=$child['title']?></a>
                </li>
                <?php $i++; endforeach; ?>
              </ul>
            </div>
        </div>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</nav>
<?php endif; ?>


