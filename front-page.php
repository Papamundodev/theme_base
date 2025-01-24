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

    <!-- Latest services -->
    <section id="latest-services" class="latest-posts section">

        <!-- Section Title -->
        <div class="container section-title" >
        <h2><?=__('Our services', 'theme_base')?></h2>
        <p><?=__('Our services available for you', 'theme_base')?></p>
        </div><!-- End Section Title -->
        <div class="container">
            <?php
            // get 3 last sticky posts off the term "services" using slug
            $sticky_posts = get_option('sticky_posts');
            $args_services = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__in' => $sticky_posts,
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'services',

            );
            $featured_services = get_posts($args_services);
            ?>

            <div class="row">
                <?php foreach ($featured_services as $post) : setup_postdata($post); ?>
                    <div class="col-lg-6 col-xxl-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>

            <!-- Button to see the page services -->
            <div class="text-center mt-4">
                <a href="<?=get_category_link(get_category_by_slug('services')->term_id)?>" class="btn btn-primary"><?=__('See all services', 'theme_base');?></a>
            </div>
        </div>
    </section>
    <!-- /Latest services -->
            
    <!-- Latest resources -->
    <section id="latest-posts" class="latest-posts section">

        <!-- Section Title -->
        <div class="container section-title" >
        <h2><?=__('Our latest resources', 'theme_base');?></h2>
        <p><?=__('Our latest resources available for you', 'theme_base');?></p>
        </div><!-- End Section Title -->
        <div class="container">
            <?php
            // get 3 last sticky posts that are not in the term "services" using slug
            $cat_services_id = get_term_by('slug', 'services', 'category')->term_id;
            $sticky_posts = get_option('sticky_posts');
            $args_resources = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__in' => $sticky_posts,
                'orderby' => 'date',
                'order' => 'DESC',
                'category__not_in' => [$cat_services_id],


            );
            $featured_resources = get_posts($args_resources);
            ?>

            <div class="row">
                <?php foreach ($featured_resources as $post) : setup_postdata($post); ?>
                    <div class="col-lg-6 col-xxl-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>

            <!-- Button to see all resources -->
            <div class="text-center mt-4"  data-aos-delay="100" data-aos-anchor-placement="bottom-bottom">
                <a href="<?=get_category_link(get_category_by_slug('ressources')->term_id)?>" class="btn btn-primary">See all resources</a>
            </div>
        </div>
    </section>
    <!-- /Latest resources -->

    <!-- Testimonials Section -->
    <section id="insurances-carousel" class="carrousels section light-background">
        <!-- Section Title -->
        <div class="container section-title" >
            <h2><?=__('Insurances', 'theme_base');?></h2>
            <p><?=__('Our insurances available for you', 'theme_base');?></p>
        </div><!-- End Section Title -->

        <div class="container">
            <?php get_template_part('partials/carrousel'); ?>
        </div>
    </section><!-- /carrousels Section -->

</main>

<!-- Preloader -->
<div id="preloader"></div>

<?php
get_footer();