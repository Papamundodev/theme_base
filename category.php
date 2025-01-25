<?php
get_header();
global $wp_query;
$posts = $wp_query->posts;
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
?>

    <main id="main-<?=$theme_template_name?>">

    <section id="category-<?=$object->slug?>" class="category section">

        <!-- Page Title -->
        <div class="container page-title mb-5">
            <h1><?=$object->name?></h1>
        </div><!-- End Page Title -->

        <div class="container">

            <div class="row list-layout">
                <?php foreach ($posts as $post) : setup_postdata($post); ?>
                    <div class="col-lg-6 col-xxl-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                        <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>

        </div>
    </section>
    </main>

<?php
get_footer();