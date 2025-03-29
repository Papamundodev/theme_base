<?php
$post = $args['post'];
$color = $args['color'] ?? 2;
$title = $post->post_title;
$content = $post->post_content;
$content = wp_trim_words($content, 20, '...');
$featured_image = get_the_post_thumbnail_url($post, 'medium');

?>
<article class="post-preview ">
    <div class="post-preview__image" >
        <img src="<?=$featured_image; ?>" alt="<?=$title; ?>">
    </div>
    <div class="post-preview__content" >

            <a href="<?=get_permalink($post); ?>" class="post-preview__link">
                 <h3 class="" style="color: var(--accent-color-<?=$color;?>);"><?=$title; ?></h3>
                <div class="content">
                    <div><?=$content; ?></div>
                </div>
            </a>

    </div>
</article>