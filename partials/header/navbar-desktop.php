<?php
$object= get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$theme_location = $args['theme_location'] ?? "header";

?>


<?php $menu_items = \Theme_base\Base::wp_get_menu_array($theme_location);?>
<?php if(is_array($menu_items) && count($menu_items) > 0): ?>
<nav id="navmenu-<?=$theme_location?>" class="navmenu navmenu-desktop">
  <ul class="navmenu-list">
    <?php foreach($menu_items as $item): ?>
      <?php if(empty($item['children'])):?>
        <li class="<?= \Theme_base\Base::get_active_class($item) ?>">
          <a class="nav-link" 
          href="<?=$item['url']?>"
          target="<?=$item['target']?>"
          rel="<?= $item['target'] === '_blank' ? 'noopener noreferrer' : '' ?>"
          ><?=$item['title']?></a>
        </li>
      <?php else: ?>

        <!-- desktop dropdown -->

        <div name="navmenu-header-dropdown-<?=$theme_location?>" class="dropdown dropdown-over dropdown-<?=$theme_location === 'footer' ? "footer" : "header" ?>">
            <a href="<?=$item['url']?>" class="nav-link"><?=$item['title']?></a>
            <svg class="plus-icon-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
              <path id="path-1" d="M32 128C32 123.582 35.5817 120 40 120L216 120C220.418 120 224 123.582 224 128V128C224 132.418 220.418 136 216 136H128H40C35.5817 136 32 132.418 32 128V128Z" />
              <path id="path-2" d="M128 224C123.582 224 120 220.418 120 216V40C120 35.5817 123.582 32 128 32V32C132.418 32 136 35.5817 136 40V128V216C136 220.418 132.418 224 128 224V224Z" />
            </svg>  
        
          <ul class="dropdown-menu">
            <?php foreach($item['children'] as $child): ?>
              <li class="<?= \Theme_base\Base::get_active_class($child) ?>">
                <a  class="nav-link"
                href="<?=$child['url']?>"
                title="<?=$child['title']?>"
                target="<?=$child['target']?>"
                rel="<?= $child['target'] === '_blank' ? 'noopener noreferrer' : '' ?>"
                ><?=$child['title']?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</nav>
<?php endif; ?>


