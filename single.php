<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
?>

<main id="main-<?=$theme_template_name?>" class="">

    <section class="section-container">

        <div class="">    

            <?php
            if ( have_posts() ):

                while ( have_posts() ):
                the_post(); 
                get_template_part( 'partials/article/post-full' );
            endwhile;

        endif;
        ?>

        </div>

    </section>

</main>

<?php
get_footer();