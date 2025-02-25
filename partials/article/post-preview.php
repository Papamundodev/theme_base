<?php
$post = $args['post'];
$title = get_the_title($post);
$content = get_the_content($post);
$content = wp_trim_words($content, 100, '...');

$default_class = get_the_post_thumbnail_url($post, 'medium') ? '' : 'post-preview__image--default';
?>
<article class="card card-resource">
    <div class="card-body vstack px-0">
        <h4 class=""><?=$title; ?></h4>
        <p class=""><?=$content; ?></p>
    </div>
    <?php if (get_permalink($post)) : ?>
    <div class="d-flex  align-items-center">
        <a href="<?=get_permalink($post); ?>" class="btn btn-primary stretched-link">
            <span class="">Read more</span><span class="visually-hidden"> about <?=$title;?></span>
        </a>
    </div>
    <?php endif; ?>
</article>