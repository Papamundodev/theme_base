<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$featured_image = get_the_post_thumbnail_url($object->ID);
$content = wpautop($object->post_content);
$title = $object->post_title;
?>


<main id="main-<?=$theme_template_name?>" class="main">

            <!-- Page Title -->
    <div class="wrapper">
        <div class="page-title">
            <h1><?=$title; ?></h1>
        </div><!-- End Page Title -->
    </div>

    <div class="wrapper">
        <?php get_template_part('partials/modules/module-command-mobile'); ?>
    </div>

    <?php if($content) : ?>
        <section class="section">
            <div class="wrapper content">
                <?=$content;?>
            </div>
        </section>
    <?php endif; ?>

</main>


<?php
get_footer();