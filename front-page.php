<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$featured_image = get_the_post_thumbnail_url($object->ID);
$content = wpautop(get_the_content());
?>


<main id="main-<?=$theme_template_name?>" class="main">
    <h1>Front page</h1>

    <!-- Hero Section -->
    <?php get_template_part('partials/hero', null, ['object' => $object]); ?>
    <!-- /Hero Section -->

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