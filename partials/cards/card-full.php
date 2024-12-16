<?php
global $post;
$post_img  = get_post_image($post);
?>

<div class="card-full">
    <img src="<?=$post_img; ?>" alt="<?=get_the_title(); ?>" class="card-full__image">
    <h2 class="card-full__title"><?=get_the_title(); ?></h2>
    <div class="card-full__content"><?=wpautop(get_the_content());?></div>
</div>