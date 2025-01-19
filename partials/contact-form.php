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
    <div class="container section-title" data-aos="fade-up">
    <h2><?=$contact_title;?></h2>
    <p><?=$contact_description;?></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

        <div class="col-lg-5">
        <div class="info-wrap">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="<?=$google_maps_link?>" target="_blank" class="text-decoration-none d-flex align-items-center ">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
                <h3>Address</h3>
                <p><?=$address;?></p>
            </div>
            </a>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <a href="tel:<?=$phone?>" class="text-decoration-none d-flex align-items-center">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
                <h3>Call Us</h3>
                <p><?=$phone;?></p>
            </div>
            </a>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <a href="mailto:<?=$email?>" class="text-decoration-none d-flex align-items-center">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
                <h3>Email Us</h3>
                <p><?=$email;?></p>
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

        <div class="col-lg-7">
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
            <input type="hidden" name="action" value="submit_contact_form">
            <?php wp_nonce_field('submit_contact_form', 'contact_nonce'); ?>
            
            <div class="row gy-4">
            <div class="col-md-6">
                <label for="name-field" class="pb-2">Your Name</label>
                <input type="text" name="name" id="name-field" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="email-field" class="pb-2">Your Email</label>
                <input type="email" class="form-control" name="email" id="email-field" required>
            </div>

            <div class="col-md-12">
                <label for="subject-field" class="pb-2">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject-field" required>
            </div>

            <div class="col-md-12">
                <label for="message-field" class="pb-2">Message</label>
                <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
            </div>

            <?php 
            if (isset($_GET['status'])) {
                if ($_GET['status'] === 'success') {
                    echo '<div class="sent-message">Votre message a été envoyé. Merci!</div>';
                } elseif ($_GET['status'] === 'error') {
                    echo '<div class="error-message">Une erreur est survenue. Veuillez réessayer.</div>';
                }
            }
            ?>

            <div class="col-md-12 text-center">
                <button type="submit">Send Message</button>
            </div>
            </div>
        </form>
        </div>

    </div>

    </div>

    </section><!-- /Contact Section -->
</main>
<?php get_footer(); 