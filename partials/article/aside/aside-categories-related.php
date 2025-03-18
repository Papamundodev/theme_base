<?php
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$get_term_id = wp_get_post_terms($object->ID, 'category');

$terms_active = [];
foreach($get_term_id as $term){
    $terms_active[] = $term->term_id;
}
?>


<?php $menu_items = \Theme_Base\Base::wp_get_term_array($terms_active);?>
<?php if(is_array($menu_items) && count($menu_items) > 0): ?>
<nav id="navmenu-aside-categories-related" class="navmenu navmenu-aside-categories-related">
  <div class="wrapper-popover-header">
    <p>Categories</p>
    <button popovertarget="aside-categories-related" popovertargetaction="hide" class="button-mobile-close-aside btn">
    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
      </svg>
    </button>
  </div>
  <ul class="navmenu-list">
    <?php foreach($menu_items as $item): ?>
      <?php if(empty($item['children'])):?>
        <li class="<?= $item['current'] ? 'active' : '' ?>">
          <a class="nav-link" 
          href="<?=$item['url']?>"
          target="_self"
          rel="noopener"
          ><?=$item['title']?></a>
        </li>
      <?php else: ?>


        <!-- mobile dropdown -->
        <details <?=$item['open'] ? 'open' : '' ?> name="navmenu-aside-categories-related-dropdown" class="dropdown dropdown-details">
          <summary class="nav-link <?=$item['current'] ? 'active' : '' ?>"><?=$item['title']?>
          <svg class="plus-icon-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
            <path id="path-1" d="M32 128C32 123.582 35.5817 120 40 120L216 120C220.418 120 224 123.582 224 128V128C224 132.418 220.418 136 216 136H128H40C35.5817 136 32 132.418 32 128V128Z" />
            <path id="path-2" d="M128 224C123.582 224 120 220.418 120 216V40C120 35.5817 123.582 32 128 32V32C132.418 32 136 35.5817 136 40V128V216C136 220.418 132.418 224 128 224V224Z" />
          </svg>  
          </summary>
      
          <ul class="dropdown-menu">
            <?php foreach($item['children'] as $child): ?>
              <li class="<?= $child['current'] ? 'active' : '' ?>">
                <a  class="nav-link"
                href="<?=$child['url']?>"
                title="<?=$child['title']?>"
                target="_self"
                rel="noopener"
                ><?=$child['title']?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </details>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</nav>
<?php endif; ?>






