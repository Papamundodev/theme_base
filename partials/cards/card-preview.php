<?php
$post = $args['post'];
$title = get_the_title($post);
$content = get_the_content($post);
$content_trimmed = wp_trim_words($content, 10);
$arcane = get_the_terms($post, 'arcanes');
$arcane_name = $arcane[0]->name;
$arcane_slug = $arcane[0]->slug;
$default_class = get_the_post_thumbnail_url($post) ? '' : 'card__image--default';
?>
<a href="<?=get_permalink($post); ?>" class="card__link">
    <div class="card layout-cards-1__item">
        <img src="<?=get_post_image($post); ?>" alt="<?=$title; ?>" class="card__image <?=$default_class ? 'card__image--default' : ''; ?>">
        <h2 class="card__title"><?=$title; ?></h2>
        <p class="card__content"><?=$content_trimmed; ?></p>
    </div>
</a>