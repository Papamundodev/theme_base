<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>

<?php
if (function_exists('wp_body_open')){
    wp_body_open() ;
}
?>

<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <?php if (function_exists('get_field')): ?>

        <!-- Logo -->
        <?php get_template_part('partials/header/logo'); ?>
        <!-- End Logo -->

        <!-- Social Links -->
        <?php get_template_part('partials/social-links'); ?>
        <!-- End Social Links -->

        <!-- Navbar -->
        <?php get_template_part('partials/header/navbar', 'header', ['theme_location' => 'header']); ?>
        <!-- End Navbar -->

    <?php endif; ?>

</header>