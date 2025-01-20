<?php
global $post;
$content = get_the_content();
$title = get_the_title();
$content = wpautop($content);
?>

<div class="post-full">

    <!-- Section Title -->
    <div class="section-title">
        <h2><?=$title; ?></h2>
    </div>
    <!-- End Section Title -->

    <?php if (has_post_thumbnail($post)) : ?>
    <img src="<?=get_the_post_thumbnail_url($post); ?>" alt="<?=$title; ?>" class="img-fluid" data-aos="fade-up" data-aos-delay="500">
    <?php endif; ?>
    <div data-aos="fade-up" data-aos-delay="500"><?=$content;?></div>
</div>
