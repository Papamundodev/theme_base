<?php
$post = $args['post'];
$title = get_the_title($post);
$content = get_the_content($post);
$content = wpautop(wp_trim_words($content, 100, '...'));

$default_class = get_the_post_thumbnail_url($post, 'medium') ? '' : 'post-preview__image--default';
?>
<div class="card card-resource">
    <?php if (has_post_thumbnail($post)) : ?>
        <img src="<?=get_the_post_thumbnail_url($post, 'medium'); ?>" 
             srcset="<?= wp_get_attachment_image_srcset(get_post_thumbnail_id($post), 'medium'); ?>"
             sizes="(max-width: 576px) 100vw, 576px"
             alt="<?=esc_attr($title); ?>" 
             class="card-img-top" 
             loading="lazy">
    <?php endif; ?>
    <div class="card-body vstack px-0">
        <h4 class=""><?=$title; ?></h4>
        <p class=""><?=$content; ?></p>
    </div>
    <?php if (get_permalink($post)) : ?>
    <div class="d-flex  align-items-center">
        <a href="<?=get_permalink($post); ?>" class="btn btn-primary stretched-link">
            <span class="">Read more</span>
        </a>
    </div>
    <?php endif; ?>
</div>