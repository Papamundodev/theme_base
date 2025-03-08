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
    <div class="wrapper">
        <?php get_template_part('partials/header/logo'); ?>
    </div>
    <div class="wrapper">
        <?php get_template_part('partials/header/navbar'); ?>
    </div>
</header>