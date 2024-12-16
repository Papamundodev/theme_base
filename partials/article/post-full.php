<?php
global $post;
$content = get_the_content();
$title = get_the_title();
$content = wpautop($content);
?>

<div class="post-full">
    <img src="<?=get_post_image($post); ?>" alt="<?=$title; ?>" class="post-full__image">
    <h2 class="post-full__title"><?=$title; ?></h2>
    <div class="post-full__content"><?=$content;?></div>
</div>