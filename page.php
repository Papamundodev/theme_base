<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$content = get_the_content();
$title = get_the_title();
?>

    <main id="main-<?=$theme_template_name?>">

        <section class="section section-container">

        <div class="container">

        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>

        <!-- Section Title -->
        <div class="section-title">
            <h1 class=""><?=$title; ?></h1>
        </div>
        <!-- End Section Title -->

        <div><?=$content;?></div>

        </div>

        </section>

    </main>

<?php
get_footer();