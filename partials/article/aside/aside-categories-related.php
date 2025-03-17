<?php
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$get_term_id = wp_get_post_terms($object->ID, 'category');
$terms_active = [];
foreach($get_term_id as $term){
    $terms_active[] = $term->term_id;
}
?>


<h1>Categories</h1>

<?php $menu_items = \Theme_Base\Base::wp_get_term_array($terms_active);?>
<?php if(is_array($menu_items) && count($menu_items) > 0): ?>
<nav id="navmenu-aside-categories-related" class="navmenu navmenu-aside-categories-related">
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
          <summary class="nav-link <?=$item['open'] ? 'active' : '' ?>"><?=$item['title']?>
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



