<?php
$post = $args['post'];
$title = get_the_title($post);
$content = get_the_excerpt($post);
$content = wpautop($content);
$default_class = get_the_post_thumbnail_url($post) ? '' : 'post-preview__image--default';
?>
<div class="card ">
    <?php if (get_the_post_thumbnail_url($post)) : ?>
        <img src="<?=get_post_image($post); ?>" alt="<?=$title; ?>" class="card-img-top <?=get_the_post_thumbnail_url($post) ? '' : $default_class; ?>"> 
    <?php endif; ?>
    <div class="card-body vstack gap-3">
        <h4 class=""><?=$title; ?></h4>
        <p class=""><?=$content; ?></p>
    </div>
    <div class="d-flex ">
        <a href="<?=get_permalink($post); ?>" class="btn btn-primary">
            <span class="">Read more</span>
        </a>
    </div>
</div>
