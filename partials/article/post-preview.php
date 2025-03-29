<?php
$post = $args['post'];
$color = $args['color'] ?? 2;
$title = $post->post_title;
$content = $post->post_content;
$content = wp_trim_words($content, 20, '...');
$featured_image = get_the_post_thumbnail_url($post, 'medium');

?>
<article class="post-preview ">
    <div class="post-preview__content" >
        <h3 class="" style="color: var(--accent-color-<?=$color;?>);"><?=$title; ?></h3>
        <div class="content">
            <div><?=$content; ?></div>
        </div>
    <?php if (get_permalink($post)) : ?>
        <div class="post-preview__link">
            <a href="<?=get_permalink($post); ?>" class="">
                <span class=""><?=__('Read more', 'theme_base');?></span>
            </a>
        </div>
    <?php endif; ?>
    </div>
</article>