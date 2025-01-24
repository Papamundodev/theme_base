<?php
get_header();
global $wp_query;
$posts = $wp_query->posts;
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
?>

    <main id="main-<?=$theme_template_name?>">
        <section id="category-<?=$object->slug?>" class="category section">
            <div class="container">

                <!-- Section Title -->
                <div class="section-title">
                    <?php if ( function_exists('yoast_breadcrumb') ) : ?>
                    <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
                    <?php endif; ?>

                    <h2><?=$object->name?></h2>
                    <p><?=$object->description?></p>
                </div><!-- End Section Title -->
                
                <div class="vstack services-list">
                    <?php foreach ($posts as $i => $post) : setup_postdata($post); ?>
                        <div class="mb-4 <?=($i % 2 == 0) ? 'dark-background img-left' : 'light-background img-right';?>" data-aos="fade-up" data-aos-delay="200">
                            <?php get_template_part('partials/article/service-preview', null, ['post' => $post]); ?>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>

            </div>
        </section>
    </main>

<?php
get_footer();