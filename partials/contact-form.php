<?php
/**
 * Template Name: About Page
 */

$about_title = get_the_title();
$about_description = get_the_content();
$address = get_field('address', 'option');
$phone = get_field('phone_number', 'option');
$google_maps_embed = get_field('google_maps_embed', 'option');
$google_maps_link = get_field('google_maps_link', 'option');

get_header();
?>

<main id="main" class="page-preloader">
    <section id="contact" class="contact section">
    
        <!-- Page Title -->
        <div class="container page-title mb-5">
            <h1><?=$about_title?></h1>
        </div><!-- End Page Title -->

    <div class="container">

    <div class="row gy-4">

        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
        <div class="info-wrap h-100">
            <div class="info-item d-flex">
            <a href="<?=$google_maps_link?>" target="_blank" class="text-decoration-none d-flex align-items-center ">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
                <h3><?=__('Address', 'theme_base');?></h3>
                <p><?=$address;?></p>
            </div>
            </a>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
            <a href="tel:<?=$phone?>" class="text-decoration-none d-flex align-items-center">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
                <h3><?=__('Call Us', 'theme_base');?></h3>
                <p><?=$phone;?></p>
            </div>
            </a>
            </div><!-- End Info Item -->

            <?php 
            $google_maps_embed   = get_field('google_maps_embed', 'option');
            if($google_maps_embed): ?>
            <?php echo $google_maps_embed; ?>
            <?php endif; ?>
        </div>
        </div>

        <?php if(function_exists('get_field')) : ?>
            <?php
            $opening_hours = get_field('opening_hours', 'option') ?? 'Office Hours: Monday - Friday 8 - 5';
            $opening_hours_text = get_field('opening_hours_text', 'option') ?? 'Walk-ins Welcomed, Accepting New Patients';
            ?>
        <?php endif; ?>
        <div class="col-lg-7" data-aos="fade-up" data-aos-delay="500">
            <div class="info-wrap h-100">
            <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                    <h3><?=$opening_hours?></h3>
                    <p><?=$opening_hours_text?></p>
                </div>
            </div><!-- End Info Item -->
                <div class="about-img mb-4">
                    <img src="<?=get_the_post_thumbnail_url()?>" alt="<?=$about_title?>">
                </div>
                <div class="about-description text-center">
                    <i class="bi bi-quote quote-icon-left"></i>
                    <?=$about_description?>
                    <i class="bi bi-quote quote-icon-right"></i>
                </div>
            </div>
        </div>

    </div>

    </div>

    </section><!-- /Contact Section -->
</main>
<!-- Preloader -->
<div id="preloader"></div>
<?php get_footer(); 