<?php
/**
 * Template Name: Contact Page
 */

$contact_title = get_the_title();
$contact_description = get_the_content();
$address = get_field('address', 'option');
$phone = get_field('phone_number', 'option');
$email = get_field('email', 'option');
$google_maps_embed = get_field('google_maps_embed', 'option');
$google_maps_link = get_field('google_maps_link', 'option');

get_header();
?>

<main id="main" class="page-preloader">
    <section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" >
    <h2><?=$contact_title;?></h2>
    <p><?=$contact_description;?></p>
    </div><!-- End Section Title -->

    <div class="container">

    <div class="row gy-4">

        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
        <div class="info-wrap">
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

            <div class="info-item d-flex">
            <a href="mailto:<?=$email?>" class="text-decoration-none d-flex align-items-center">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
                <h3><?=__('Email Us', 'theme_base');?></h3>
                <p><?=$email;?></p>
            </div>
            </a>
            </div><!-- End Info Item -->


            <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                    <h3><?=__('Open Hours', 'theme_base');?></h3>
                    <p>Mon-Fri: 9AM to 5PM</p>
                </div>
            </div><!-- End Info Item -->

            <?php 
            $google_maps_embed   = get_field('google_maps_embed', 'option');
            if($google_maps_embed): ?>
            <?php echo $google_maps_embed; ?>
            <?php endif; ?>
        </div>
        </div>

        <div class="col-lg-7" data-aos="fade-up" data-aos-delay="500">

        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="php-email-form" enctype="multipart/form-data">
            <input type="hidden" name="action" value="submit_contact_form">
            <?php wp_nonce_field('submit_contact_form', 'contact_nonce'); ?>

            <?php 
            if (isset($_GET['status'])) {
                if ($_GET['status'] === 'success') {
                    echo '<div class="sent-message btn btn-primary mx-auto mb-5 d-block">Votre message a été envoyé. Merci!</div>';
                } elseif ($_GET['status'] === 'error') {
                    echo '<div class="error-message btn btn-primary mx-auto mb-5 d-block">Une erreur est survenue. Veuillez réessayer.</div>';
                }
            }
            ?>

            <div class="row gy-4">
            <div class="col-md-6">
                <label for="name-field" class="pb-2"><?=__('Your Name', 'theme_base');?></label>
                <input type="text" name="name" id="name-field" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="email-field" class="pb-2"><?=__('Your Email', 'theme_base');?></label>
                <input type="email" class="form-control" name="email" id="email-field" required>
            </div>

            <div class="col-md-12">
                <label for="subject-field" class="pb-2"><?=__('Subject', 'theme_base');?></label>
                <input type="text" class="form-control" name="subject" id="subject-field" required>
            </div>

            <div class="col-md-12">
                <label for="message-field" class="pb-2"><?=__('Message', 'theme_base');?></label>
                <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
            </div>

            <div class="col-md-12">
                <label for="file-field" class="pb-2"><?=__('Attachment', 'theme_base');?> (Max 5MB)</label>
                <input type="file" class="form-control" name="attachment" id="file-field" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
            </div>



            <div class="col-md-12 text-center">
                <button type="submit"><?=__('Send Message', 'theme_base');?></button>
            </div>
            </div>
        </form>
        </div>

    </div>

    </div>

    </section><!-- /Contact Section -->
</main>
<!-- Preloader -->
<div id="preloader"></div>
<?php get_footer(); 