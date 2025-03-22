<?php 
$object = get_queried_object();
$display = $args['display'] ?? "list";
$theme_template_name = basename(__FILE__, ".php");
$terms_active = [];
if(is_single()){
    $get_term_id = wp_get_post_terms($object->ID, 'post_tag');
    foreach($get_term_id as $term){
        $terms_active[] = $term->term_id;
    }
}elseif(is_category() || is_tag()){
    $terms_active[] = $object->term_id;
}

$popular_terms = get_terms(array(
    'taxonomy' => 'post_tag', // Utiliser 'post_tag' pour les tags
    'orderby' => 'count',
    'order' => 'DESC',
    'number' => 5,
    'hide_empty' => true
));

$popular_terms = \Theme_Base\Base::wp_get_term_array($popular_terms,$terms_active);
?>


<div class="wrapper-side">
<?php if(is_array($popular_terms) && count($popular_terms) > 0): ?>
<nav id="navmenu-module-most-viewed-posts" class="navmenu navmenu-module-most-viewed-posts" aria-label="Navigation most viewed posts">
  <ul class="<?= $display == "button" ? 'group-buttons' : 'navmenu-list' ?>">
    <?php foreach($popular_terms as $item): ?>
        <li class="<?= $item['current'] ? 'active' : '' ?>">
          <a class="<?= $display == "list" ? 'nav-link' : 'btn' ?>" 
          href="<?=$item['url']?>"
          target="_self"
          rel="noopener"
          ><?=$item['title']?></a>
        </li>
    <?php endforeach; ?>
  </ul>
</nav>
<?php endif; ?>
</div>
