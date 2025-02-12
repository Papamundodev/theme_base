<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$featured_image = get_the_post_thumbnail_url($object->ID);
$content = wpautop(get_the_content());
?>


<main id="main-<?=$theme_template_name?>" class="main">

    <!-- Hero Section -->
    <?php get_template_part('partials/hero', null, ['object' => $object]); ?>
    <!-- /Hero Section -->

    <?php if($content) : ?>
        <section class="section pb-0">
            <div class="container text-center">
                <?=$content;?>
            </div>
        </section>
    <?php endif; ?>

        <!-- Latest services -->
    <section id="latest-services" class="latest-posts section border-bottom">

        <!-- Section Title -->
        <div class="container">
            <div class="section-title " >
                <?php
                if (function_exists('get_field')){
                    $section_services_title = get_field('section_services_title', 'option') ?? __('Our Services', 'theme_base');
                }
                ?>
                <h2><?=$section_services_title?></h2>
            </div>
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

            <div class="vstack services-list">
                <?php if(is_array($featured_services) && count($featured_services) > 0): ?>
                    <?php foreach ($featured_services as $i => $post) : setup_postdata($post); ?>
                        <div class="mb-4 <?=($i % 2 == 0) ? 'dark-background img-left' : 'light-background img-right';?>" data-aos="fade-up" data-aos-delay="200">
                            <?php get_template_part('partials/article/service-preview', null, ['post' => $post]); ?>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>

            <!-- Button to see the page services -->
            <?php if(get_category_link(get_category_by_slug('services')->term_id)): ?>
                <div class="text-center">   
                    <a href="<?=get_category_link(get_category_by_slug('services')->term_id)?>" class="btn btn-primary btn-big"><?=__('See all services', 'theme_base');?></a>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- /Latest services -->
            
    <!-- Latest resources -->
    <section id="latest-posts" class="latest-posts section">

        <!-- Section Title -->
        <div class="container">
            <div class="section-title" >
                <?php   
                if (function_exists('get_field')){
                    $section_resources_title = get_field('section_resources_title', 'option') ?? __('Our Resources', 'theme_base');
                }
                ?>  
                <h2><?=$section_resources_title?></h2>
            </div>
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

            <div class="row list-layout">
                <?php if(is_array($featured_resources) && count($featured_resources) > 0): ?>
                    <?php foreach ($featured_resources as $post) : setup_postdata($post); ?>
                        <div class="col-lg-4 mb-4 " data-aos="fade-up" data-aos-delay="300">
                            <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>

            <?php if(get_category_link(get_category_by_slug('ressources')->term_id)): ?>
                <!-- Button to see all resources -->
                <div class="text-center"  data-aos-delay="100" data-aos-anchor-placement="bottom-bottom">
                    <a href="<?=get_category_link(get_category_by_slug('ressources')->term_id)?>" class="btn btn-primary btn-big">See all resources</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- /Latest resources -->

    <!-- Latest insurances -->
    <section id="insurances-carousel" class="carrousels section light-background">
        <!-- Section Title -->
        <div class="container">
            <div class="section-title" >
                <?php if (function_exists('get_field')){$section_insurances_title = get_field('section_insurances_title', 'option') ?? __('Our Insurances', 'theme_base');}?>
                <h2><?=$section_insurances_title?></h2>
            </div>
        </div><!-- End Section Title -->

        <div class="container">
            <?php get_template_part('partials/carrousel'); ?>
        </div>
    </section><!-- /Latest insurances -->

</main>

<!-- Preloader -->
<div id="preloader"></div>

<?php
get_footer();