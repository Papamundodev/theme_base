<?php
$post = $args['post'];
$title = $post->post_title;
$content = $post->post_content;
$content = wp_trim_words($content, 20, '...');
$featured_image = get_the_post_thumbnail_url($post, 'medium');
?>
<article class="post-preview">
    <div class="">
        <h2 class=""><?=$title; ?></h2>
        <div class="content">
            <div><?=$content; ?></div>
        </div>
    </div>
    <?php if (get_permalink($post)) : ?>
    <div class="">
        <a href="<?=get_permalink($post); ?>" class="">
            <span class=""><?=__('Read more', 'theme_base');?></span>
        </a>
    </div>
    <?php endif; ?>
</article>