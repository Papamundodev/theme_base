<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");

// Mettre à jour le compteur lors de l'affichage d'un article

?>

<main id="main-<?=$theme_template_name?>" class="">

<?php get_template_part('partials/modules/module-command-mobile'); ?>



    <section label="single-<?=$object->post_name?>" class="section"> 

        <?php
        if ( have_posts() ):

            while ( have_posts() ):
            the_post(); 
            get_template_part( 'partials/article/post-full' );
        endwhile;

        endif;
        ?>

    </section>

    <section>
        <div class="wrapper">
            <h2>Related posts</h2>
            <?php 
            $post_categories = wp_get_post_terms($object->ID, 'category');
            $post_categories_ids = array();
            foreach($post_categories as $category){
                $post_categories_ids[] = $category->term_id;
                $post_categories_ids[] = $category->parent;
            }
            $related_posts = get_posts(array(
                'post_type' => 'post',
                'category' => $post_categories_ids,
                'posts_per_page' => 5,
                'post__not_in' => array($object->ID),
                'post_status' => 'publish',
                'meta_key' => 'views',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            ));
            ?>
            <div class="layout-grid">
                <?php foreach($related_posts as $post): ?>
                <?php setup_postdata($post); ?>
                <div class="layout-grid-item">
                    <?php get_template_part( 'partials/article/post-preview' , null, ['post' => $post]); ?>
                </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <section>
        <?php
        //next previous post
        $next_post = get_next_post();
        $previous_post = get_previous_post();
        ?>
        <div class="wrapper">
            <div class="next-previous-post">
                <div class="next-previous-post-item">
                    <?php if($previous_post): ?>
                        <a href="<?php the_permalink($previous_post->ID); ?>" class="btn">
                            <p>Previous post</p>
                            <span><?=$previous_post->post_title;?></span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="next-previous-post-item">
                    <?php if($next_post): ?>
                        <a href="<?php the_permalink($next_post->ID); ?>" class="btn">
                            <p>Next post</p>
                            <span><?=$next_post->post_title;?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();