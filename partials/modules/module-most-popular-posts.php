<?php 
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
if(is_category()){
  $most_liked_posts_query = get_posts([
    'post_type' => 'post',
    'posts_per_page' => 5,
    'meta_key' => 'likes',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'tax_query' => [
      [
        'taxonomy' => $object->taxonomy,
        'field' => 'term_id',
        'terms' => $object->term_id,
      ],
    ],
  ]);
}else{
  $most_liked_posts_query = get_posts([
      'post_type' => 'post',
      'posts_per_page' => 5,
      'meta_key' => 'likes',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
]); 
}
$most_liked_posts = \Theme_Base\Base::wp_get_menu_array_posts($most_liked_posts_query, $object);
?>
<div class="wrapper-side">
<?php if(is_array($most_liked_posts) && count($most_liked_posts) > 0): ?>
<nav id="navmenu-module-most-liked-posts" class="navmenu navmenu-module-most-liked-posts" aria-label="Navigation most liked posts">
  <ul class="navmenu-list">
    <?php foreach($most_liked_posts as $item): ?>
        <li class="<?= $item['current'] ? 'active' : '' ?>">
          <a class="nav-link" 
          href="<?=$item['url']?>"
          target="_self"
          rel="noopener"
          ><?=$item['title']?></a>
          <span class="nav-link-count"><?=$item['likes'] ?? ''?></span>
        </li>
    <?php endforeach; ?>
  </ul>
</nav>
<?php endif; ?>
</div>