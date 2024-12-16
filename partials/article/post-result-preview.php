<?php
$post = $args['post'];
$title = get_the_title($post);
$content = get_the_content($post);
$content_trimmed = wp_trim_words($content, 20);
?>
<a href="<?=get_permalink($post); ?>" class="post-preview__link post-result-preview">
    <div class="post-preview">
        <div class="post-preview__content-container">
            <h2 class="post-preview__title"><?=$title; ?></h2>
            <p class="post-preview__content"><?=$content_trimmed; ?></p>
        </div>
    </div>
</a>