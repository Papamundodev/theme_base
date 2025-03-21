<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");

// Mettre à jour le compteur lors de l'affichage d'un article

?>

<main id="main-<?=$theme_template_name?>" class="">

    <section>
        <div class="wrapper-command-mobile wrapper">
            <button class="open-module btn" popovertarget="module-categories-related">
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

            <button class="open-module btn" popovertarget="module-breadcrumbs">
                <p>You are here</p>
            </button>
            <button class="open-module btn" popovertarget="module-most-viewed">
                <p>Most viewed</p>
            </button>
            <button class="open-module btn" popovertarget="module-author-info">
                <p>Author info</p>
            </button>
            <button class="open-module btn" popovertarget="module-most-popular-posts">
                <p>Most popular posts</p>
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