<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>   
    <meta name="description" content="<?=get_the_title()?>"> <!-- TODO: add description when excerpt are sets \Theme_base\Base::get_meta_description()-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
    <?php if(is_single()): ?>
        <meta property="og:url" content="<?=get_the_permalink()?>" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?=get_the_title()?>" />
        <meta property="og:description" content="this is a description" /> <!-- TODO: add description when excerpt are sets -->
        <meta property="og:image" content="<?=get_the_post_thumbnail_url()?>" />
    <?php endif; ?>

    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<?php
if (function_exists('wp_body_open')){
    wp_body_open() ;
}
?>
<?php
$object = get_queried_object();
?>
<header>
        <!-- Logo -->
    <div class="wrapper-logo">
        <?php get_template_part('partials/header/logo'); ?>
    </div>

    <div class="wrapper-navbar">
        <?php get_template_part('partials/header/navbar-desktop', null, ['theme_location' => 'header']); ?>
    </div>
    <div class="wrapper-navbar">
        <?php get_template_part('partials/header/navbar-mobile', null, ['theme_location' => 'header']); ?>
    </div>

    <div class="wrapper-header-right-content">
        <?php if (function_exists('aas_open_search_form')): ?>
            <div class="wrapper-open-search">
                <?=do_shortcode('[aas_open_search]'); ?>
            </div>
        <?php endif; ?>
        <?php if (function_exists('theme_light_dark_form')): ?>
            <div class="wrapper-theme-light-dark">
                <?=do_shortcode('[theme_light_dark]'); ?>
            </div>
        <?php endif; ?>
        <div class="wrapper-theme-navbar-toggler">
            <button popovertarget="navmenu-header-mobile" id="theme-navbar-toggler">
                <span class="custom-burger"></span>
                <span class="custom-burger"></span>
                <span class="custom-burger"></span>
                <span class="custom-burger"></span>
            </button>
        </div>
    </div>

    <div popover id="search-results-popover" class="wrapper-search-results">
        <?php
            $latest_posts = get_posts([
                'post_type' => 'post',
                'posts_per_page' => 5,
                ]);
        ?>
        <?php if (function_exists('aas_search_form')): ?>
        <div class="wrapper-ajax-autocomplete-search">
            <?=do_shortcode('[ajax_autocomplete_search]'); ?>
        </div>
        <?php endif; ?>
        <div id="search-results">
            <h2><?=__('Latest posts', 'theme_base'); ?></h2>
            <?php foreach ($latest_posts as $post): ?>
                <div class="wrapper-search-result">
                    <a href="<?=get_the_permalink($post); ?>">
                        <h2><?=get_the_title($post); ?></h2>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</header>


<div class="<?=is_single() || is_category() || is_tag() || is_home() ? 'wrapper-layout' : 'wrapper-layout-full-width'; ?>">

<?php if(is_single() || is_category() || is_tag() || is_home()): ?>
<aside class="left">
    <div class="wrapper-all-modules">
        <div id="module-most-viewed" class="wrapper-module">
            <div class="wrapper-popover-header">
                <p>Most viewed</p>
                <button popovertarget="module-most-viewed" popovertargetaction="hide" class="button-mobile-close-module btn">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                    </svg>
                </button>
            </div>
            <?php get_template_part('partials/modules/module-most-viewed-posts'); ?>
        </div>
        <?php if(is_single()): ?>
        <div id="module-author-info" class="wrapper-module">
            <div class="wrapper-popover-header">
                <p>Author info</p>
                <button popovertarget="module-author-info" popovertargetaction="hide" class="button-mobile-close-module btn">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                    </svg>
                </button>
            </div>
            <?php get_template_part('partials/modules/module-author-info'); ?>
        </div>
        <?php endif; ?>
        <div id="module-most-popular-posts" class="wrapper-module">
            <div class="wrapper-popover-header">
                <p>Most popular posts</p>
                <button popovertarget="module-most-popular-posts" popovertargetaction="hide" class="button-mobile-close-module btn">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                    </svg>
                </button>
            </div>
            <?php get_template_part('partials/modules/module-most-popular-posts'); ?>
        </div>
        <div id="module-latest-posts" class="wrapper-module">
            <div class="wrapper-popover-header">
                <p>Latest posts</p>
                <button popovertarget="module-latest-posts" popovertargetaction="hide" class="button-mobile-close-module btn">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                    </svg>
                </button>
            </div>
            <?php get_template_part('partials/modules/module-latest-posts'); ?>
        </div>
    </div>
</aside>
<?php endif; ?>
    
<div class="wrapper-center-content">


<?php


