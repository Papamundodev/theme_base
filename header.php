<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>   
    <meta name="description" content="<?= \Theme_base\Base::get_meta_description() ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<?php
if (function_exists('wp_body_open')){
    wp_body_open() ;
}
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

<?php if (is_single()) : ?>
<aside class="left">
    <div class="wrapper-side-left">
                   <?php
             $breadcrumbs = \Theme_base\Base::get_breadcrumbs();
            //  var_dump(wp_get_post_terms($object->ID, 'category')); 
            // $terms = wp_get_post_terms($object->ID, 'category');
            // $term_related = [];
            // foreach ($terms as $term) {
            //     $term_related["id"] = $term->term_id;
            //     $term_related["name"] = $term->name;
            //     $term_related["slug"] = $term->slug;
            //     $term_related["url"] = get_term_link($term);
            //     $term_related["parent"] = $term->parent;
            //     $term_related["children"] = get_term_children($term->term_id, 'category');
                
            // }
            ?>

            <div id="breadcrumbs" class="breadcrumbs-custom">
                <ul>
                    <?php foreach ($breadcrumbs as $breadcrumb): ?>
                        <?php if ($breadcrumb === end($breadcrumbs)): ?>
                            <li><?= $breadcrumb['text'] ?></li>
                        <?php else: ?>
                            <li><a href="<?= $breadcrumb['url'] ?>"><?= $breadcrumb['text'] ?></a></li><span class="separator"></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
    </div>
</aside>
<?php endif; ?>
<div class="wrapper-center-content">
    



