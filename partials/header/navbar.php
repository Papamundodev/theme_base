<?php
$object= get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$theme_location = $args['theme_location'] ?? "header";

?>


<?php $menu_items = \Theme_base\Base::wp_get_menu_array($theme_location);?>
<?php if(is_array($menu_items) && count($menu_items) > 0): ?>
<nav id="navmenu" class="navmenu-<?=$theme_location?>">
  <ul class="">
    <?php foreach($menu_items as $item): ?>
      <?php if(empty($item['children'])):?>
        <li class="<?= \Theme_base\Base::get_active_class($item) ?>">
          <a class="nav-link" 
          href="<?=$item['url']?>"
          title="<?=$item['title']?>"
          target="<?=$item['target']?>"
          rel="<?= $item['target'] === '_blank' ? 'noopener noreferrer' : '' ?>"
          ><?=$item['title']?></a>
        </li>
      <?php else: ?>
        <li class="dropdown">
          <a class="nav-link" href="<?=$item['url']?>"><span><?=$item['title']?></span> <i class=""></i></a>
          <ul>
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
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</nav>
<?php endif; ?>
