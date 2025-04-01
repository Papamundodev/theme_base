<?php
$post = $args['post'];
$color = $args['color'] ?? 2;
$title = $post->post_title;
$content = $post->post_content;
$content = wp_trim_words($content, 13, '...');
$featured_image = get_the_post_thumbnail_url($post, 'medium');
$number = get_field('ordre', $post); //to roman number
$number = \Theme_base\Base::roman_number($number);
$term = get_the_terms($post, 'arcanes');
$term = $term[0]->name;


?>
<article id="post-<?=$post->ID;?>" class="post-preview anchored">
    <div>
        <div class="post-preview__content" >
            <a href="<?=get_permalink($post); ?>" class="post-preview__link">
                <div class="post-preview__title">
                    <h3 class=""><?=$title; ?></h3>
                    <span class=""><?=$number;?></span>
                </div>
                <div class="post-preview__figure">
                    <img src="<?=$featured_image; ?>" alt="<?=$title; ?>">
                </div>
                <div class="post-preview__category">
                    <span><?=$term;?></span>
                    <div class="post-preview__category-icon">
                    </div>  
                </div>
                <div class="content">
                    <p><?=$content; ?></p>
                </div>
            </a>
        </div>
    </div>
</article>