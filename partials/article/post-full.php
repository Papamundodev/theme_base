<?php
global $post;
$content = get_the_content();
$title = get_the_title();
$content = wpautop($content);
?>

<div class="post-full">

    <!-- Section Title -->
    <div class="section-title" data-aos="fade-up">
        <h2><?=$title; ?></h2>
    </div>
    <!-- End Section Title -->

    <?php if (has_post_thumbnail($post)) : ?>
    <img src="<?=get_post_image($post); ?>" alt="<?=$title; ?>" class="img-fluid" data-aos="fade-up" data-aos-delay="100">
    <?php endif; ?>
    <div class="" data-aos="fade-up" data-aos-delay="100"><?=$content;?></div>
</div>