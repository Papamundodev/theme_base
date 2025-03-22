<?php 
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$latest_posts_query = get_posts([
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
]); 
$latest_posts = \Theme_Base\Base::wp_get_menu_array_posts($latest_posts_query, $object);
?>

<div class="wrapper-side">
<?php if(is_array($latest_posts) && count($latest_posts) > 0): ?>
<nav id="navmenu-module-latest-posts" class="navmenu navmenu-module-latest-posts" aria-label="Navigation latest posts">
  <ul class="navmenu-list">
    <?php foreach($latest_posts as $item): ?>
        <li class="<?= $item['current'] ? 'active' : '' ?>">
          <a class="nav-link" 
          href="<?=$item['url']?>"
          target="_self"
          rel="noopener"
          ><?=$item['title']?></a>
          <span class="nav-link-count"><?=$item['date'] ?? ''?></span>
        </li>
    <?php endforeach; ?>
  </ul>
</nav>
<?php endif; ?>
</div>