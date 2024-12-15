<?php
$object= get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$theme_location = $args['theme_location'] ?? "header";

?>

<nav class="nav">

      <?php $menu_items = \Moon\Base::wp_get_menu_array($theme_location);?>

      <ul class="nav__menu">
        <?php foreach($menu_items as $item): ?>
          <?php if(empty($item['children'])):?>

            <li class="nav__menu__item <?= in_array('current-menu-item', $item['classes'] ? $item['classes'] : []) ? 'current-menu-item' : '' ?>">
              <a class="nav__menu__item__link" 
              href="<?=$item['url']?>"
              title="<?=$item['title']?>"
              target="<?=$item['target']?>"
              ><?=$item['title']?></a>
            </li>
          <?php else: ?>
            <li class="nav__menu__item">
              <a class="nav__menu__item__link" href="<?=$item['url']?>"><?=$item['title']?></a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>


</nav>