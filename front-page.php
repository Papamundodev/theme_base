<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$featured_image = get_the_post_thumbnail_url($object->ID);
$content = wpautop($object->post_content);
?>


<main id="main-<?=$theme_template_name?>" class="main">

    <?php if($content) : ?>
        <section class="section">
            <div class="wrapper content">
                <?=$content;?>
            </div>
        </section>
    <?php endif; ?>




</main>


<?php
get_footer();