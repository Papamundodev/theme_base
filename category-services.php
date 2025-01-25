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

                <!-- Page Title -->
                <div class="page-title mb-5">
                    <h1><?=$object->name?></h1>
                </div><!-- End Page Title -->
                
                <div class="vstack services-list">
                    <?php foreach ($posts as $i => $post) : setup_postdata($post); ?>
                        <div class="mb-4 <?=($i % 2 == 0) ? 'dark-background img-left' : 'light-background img-right';?>" data-aos="fade-up" data-aos-delay="200">
                            <?php get_template_part('partials/article/service-preview', null, ['post' => $post]); ?>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>

            </div>
        </section>

        <?php
        $insurances = get_field('insurances', 'option');
        ?>
        
    </main>

<?php
get_footer();