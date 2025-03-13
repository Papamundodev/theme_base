<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
?>

<main id="main-<?=$theme_template_name?>" class="">

    <section class="section"> 

        <div class="wrapper">

            <?php
            $breadcrumbs = \Theme_base\Base::get_breadcrumbs();
            ?>

            <div id="breadcrumbs" class="breadcrumbs-custom">
                <ul>
                    <?php foreach ($breadcrumbs as $breadcrumb): ?>
                        <?php if ($breadcrumb === end($breadcrumbs)): ?>
                            <li><?= $breadcrumb['text'] ?></li>
                        <?php else: ?>
                            <li><a href="<?= $breadcrumb['url'] ?>"><?= $breadcrumb['text'] ?></a></li><span class="separator">|</span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>

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