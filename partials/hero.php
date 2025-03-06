<?php
$object = $args['object'];
$featured_image = get_the_post_thumbnail_url($object->ID);
?>

<section id="hero" class="hero section dark-background">

    <img src="<?=$featured_image?>" alt="" class="">

    <div class="container" data-aos="fade-up" data-aos-delay="300">
        <h2><?=get_the_title($object->ID)?></h2>
        <p><?=get_the_excerpt($object->ID)?></p>
    </div>

</section>