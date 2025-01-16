<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$featured_image = get_the_post_thumbnail_url($object->ID);
?>


<main id="main-<?=$theme_template_name?>" class="main">

    <!-- Hero Section -->
    <?php get_template_part('partials/hero', null, ['object' => $object]); ?>
    <!-- /Hero Section -->

    <!-- Latest posts -->
    <section id="latest-posts" class="latest-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
        <h2>Our services</h2>
        <p>Our services available for you</p>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <?php
            // get 3 last sticky posts
            $sticky_posts = get_option('sticky_posts');
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__in' => $sticky_posts,
            );
            $featured_posts = get_posts($args);
            ?>

            <div class="row">
                <?php foreach ($featured_posts as $post) : setup_postdata($post); ?>
                    <div class="col-lg-6 col-xxl-4 mb-4">
                        <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <!-- /Latest posts -->

    <!-- Testimonials Section -->
    <section id="" class="carrousels section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
        <h2>Insurances</h2>
        <p>Our insurances available for you</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <?php get_template_part('partials/carrousel'); ?>
        </div>

    </section><!-- /carrousels Section -->

</main>

<?php
get_footer();