<?php
get_header();
global $wp_query;
$posts = $wp_query->posts;
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
?>

    <main id="main-<?=$theme_template_name?>">

    <section id="category-<?=$object->slug?>" class="category section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">

        <?php
        
        if ( function_exists('yoast_breadcrumb') ) : ?>
        <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
        <?php endif; ?>

        <h2><?=$object->name?></h2>
        <p><?=$object->description?></p>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <div class="col-lg-6 col-xxl-4 mb-4">
                        <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>

        </div>
    </section>
    </main>

<?php
get_footer();