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
        <a class="site-title__link" href="#"><?=get_bloginfo('name')?></a>
    </div>  
    <?php get_template_part('partials/navbar', 'navbar', ['theme_location' => 'header']); ?>
</header>