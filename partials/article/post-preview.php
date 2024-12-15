<?php
$post = $args['post'];
$title = get_the_title($post);
$content = get_the_content($post);
$content_trimmed = wp_trim_words($content, 100);
$default_class = get_the_post_thumbnail_url($post) ? '' : 'post-preview__image--default';
?>
<a href="<?=get_permalink($post); ?>" class="post-preview__link">
    <div class="post-preview">
        <img src="<?=get_post_image($post); ?>" alt="<?=$title; ?>" class="post-preview__image <?=get_the_post_thumbnail_url($post) ? '' : $default_class; ?>"> 
        <div class="post-preview__content-container">
            <h2 class="post-preview__title"><?=$title; ?></h2>
            <p class="post-preview__content"><?=$content_trimmed; ?></p>
        </div>
    </div>
</a>