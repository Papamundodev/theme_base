<?php
global $post;
$title = get_the_title();
$content = get_the_content();
$content = wpautop($content);
$featured_image = get_the_post_thumbnail_url($post, "large");
$date_published = get_the_date();
$reading_time = \Theme_base\Base::get_reading_time($content);
$likes = get_post_meta(get_the_ID(), 'likes', true);
?>

<div class="post-full">

    <!-- Section Title -->
    <div class="wrapper">
        <div class="post-header">
            <div class="post-title">
                <h1><?=$title;?></h1>
                <span><?=$date_published;?></span>
                <span class="separator"></span>
                <span><?=$reading_time;?></span>
            </div>
            <div class="post-actions">
                <div>
                    <!-- Dans votre template de post -->
                    <button 
                        class="like-button" 
                        data-post-id="<?=get_the_ID(); ?>"
                        data-likes="<?=$likes; ?>"
                    >
                        <span class="like-icon">❤️</span>
                        <span class="like-count"><?=$likes; ?></span>
                    </button>
                    <span>Share</span>
                </div>
            </div>
        </div>

    </div>
    <!-- End Section Title -->

    <div class="wrapper">
            <?php if ($featured_image) : ?>
            <div class="">
                <img src="<?=$featured_image; ?>" alt="<?=$title; ?>" class="post-image">
            </div>
            <?php endif; ?>
        <div class="content"><?=$content;?></div>
    </div>
</div>