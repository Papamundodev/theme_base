<?php 
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$most_viewed_posts_query = get_posts([
    'post_type' => 'post',
    'posts_per_page' => 5,
    'meta_key' => 'views',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
]); 
$most_viewed_posts = \Theme_Base\Base::wp_get_menu_array_posts($most_viewed_posts_query, $object);
?>
  <?php

?>

<div class="wrapper-side">
<?php if(is_array($most_viewed_posts) && count($most_viewed_posts) > 0): ?>
<nav id="navmenu-module-most-viewed-posts" class="navmenu navmenu-module-most-viewed-posts" aria-label="Navigation most viewed posts">
  <ul class="navmenu-list">
    <?php foreach($most_viewed_posts as $item): ?>
        <li class="<?= $item['current'] ? 'active' : '' ?>">
          <a class="nav-link" 
          href="<?=$item['url']?>"
          target="_self"
          rel="noopener"
          ><?=$item['title']?></a>
          <span class="nav-link-count"><?=$item['views'] ?? ''?></span>
        </li>
    <?php endforeach; ?>
  </ul>
</nav>
<?php endif; ?>
</div>