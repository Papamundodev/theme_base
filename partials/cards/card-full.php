<?php
global $post;
$post_img  = get_the_post_thumbnail_url();
$content = get_the_content();
?>

<div class="card-full">
    <img src="<?=$post_img; ?>" alt="<?=get_the_title(); ?>" class="card-full__image">
    <h2 class="card-full__title"><?=get_the_title(); ?></h2>
    <p class="card-full__content"><?=$content; ?></p>
</div>