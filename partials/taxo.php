<?php
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$content = wpautop($object->description) ?? "";
?>
        <!-- Page Title -->
<div class="wrapper">
    <section>
        <div class="wrapper-command-mobile wrapper">
            <button class="open-module btn" popovertarget="module-topics">
                <p>Topics</p>
            </button>
        </div>
    </section>
    <div class="page-title">
        <h1><?=$object->name?></h1>
    </div><!-- End Page Title -->
</div>

<div id="module-topics" class="wrapper-module">
    <div class="wrapper-popover-header">
        <p>Topics</p>
        <button popovertarget="module-topics" popovertargetaction="hide" class="button-mobile-close-module btn">
            <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
            </svg>
        </button>
    </div>
    <?php get_template_part('partials/modules/module-topics', null, ['display' => "button"]); ?>
</div>



<div class="wrapper">
    <div class="page-description    ">
        <?=$content?>
    </div><!-- End Page Title -->
</div>

<div class="wrapper">
    <?php if(is_array($wp_query->posts) && count($wp_query->posts) > 0): ?>
        <div class="">
            <?php foreach ($wp_query->posts as $post) : setup_postdata($post); ?>
                <div class="post-preview">
                    <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
        <?php get_template_part('pagination'); ?>
    <?php endif; ?>
</div>