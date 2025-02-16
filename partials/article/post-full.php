<?php
global $post;
$content = get_the_content();
$title = get_the_title();
$content = wpautop($content);
$featured_image = get_the_post_thumbnail_url($post);
?>

<div class="post-full">

    <!-- Section Title -->
    <div class="container">
        <div class="section-title">
            <h1><?=$title;?></h1>
        </div>
    </div>
    <!-- End Section Title -->

    <div class="container grid-test">
        <div class="grid-test-img">
            <?php if ($featured_image) : ?>
            <img src="<?=$featured_image; ?>" alt="<?=$title; ?>" class="img-fluid" data-aos="fade-up" data-aos-delay="200">
            <?php endif; ?>
        </div>
        <div data-aos="fade-up" data-aos-delay="300"><?=$content;?></div>
    </div>

</div>