<?php
$posts = $args['posts'];
?>

<div class="layout-cards-1">
    <?php foreach($posts as $post) : setup_postdata($post); ?>
        <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
    <?php endforeach; wp_reset_postdata(); ?>
</div>

<section class="pagination">
    <?php posts_nav_link(' ','',''); ?>
</section>