<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>

<?php
if (function_exists('wp_body_open')){
    wp_body_open() ;
}
?>

<header>
    <div class="site-title">
        <a class="site-title__link" href="<?=home_url()?>"><?=get_bloginfo('name')?></a>
    </div>  
    <div class="header__search">
        <?php get_template_part('partials/navbar', 'navbar', ['theme_location' => 'header']); ?>
        <button class="search__btn" id="open-search-modal" aria-label="Search (shortcut: ⌘K)">
            <span class="search__btn__icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </span>
            <span class="search__btn__shortcut"><kbd>⌘K</kbd></span>
        </button>
    </div>
</header>

<dialog id="search-modal" class="modal section-container">
    <div class="modal__header">
        <input type="text" id="search-autocomplete" placeholder="Search...">
        <div class="modal__close-search-modal">
            <button id="close-search-modal" class="modal__close-search-modal-btn">
                X
            </button>
        </div>
    </div>
    <div class="modal__body">
        <div id="search-results"></div>
    </div>
</dialog>