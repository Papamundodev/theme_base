<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
?>

<main id="main-<?=$theme_template_name?>" class="">

    <section>
        <div class="wrapper-command-mobile wrapper">
            <button class="button-mobile-open-aside btn" popovertarget="aside-categories-related">
                <?php
                $object = get_queried_object();
                $get_term_id = wp_get_post_terms($object->ID, 'category');
                ?>
                <?php if(is_array($get_term_id) && count($get_term_id) > 0): ?>
                    <?php foreach($get_term_id as $term): ?>
                        <span><?=$term->name?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </button>
        </div>
    </section>



    <section class="section"> 

        <?php
        if ( have_posts() ):

            while ( have_posts() ):
            the_post(); 
            get_template_part( 'partials/article/post-full' );
        endwhile;

        endif;
        ?>

    </section>

</main>

<?php
get_footer();