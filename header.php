<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>   
    <meta name="description" content="<?= \Theme_base\Base::get_meta_description() ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<?php
if (function_exists('wp_body_open')){
    wp_body_open() ;
}
?>

<header id="header" class="header dark-background">
    <div class="container-xl flex-column d-flex flex-lg-row align-items-center gap-3">
    <i class="header-toggle d-lg-none bi bi-list"></i>
    <!-- Logo -->
     <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
         <?php get_template_part('partials/header/logo'); ?>
     </div>
    <!-- End Logo -->

    <!-- Navbar -->
    <?php get_template_part('partials/header/navbar', 'header', ['theme_location' => 'header']); ?>
    <!-- End Navbar -->


    <?php if (is_plugin_active('sitepress-multilingual-cms/sitepress.php')) : ?>
        <div class="wpml-widget d-flex align-items-center p-0 m-0">
            <?php dynamic_sidebar( 'wpml_theme_base' ); ?>
        </div>
    <?php endif; ?>

    </div>
</header>