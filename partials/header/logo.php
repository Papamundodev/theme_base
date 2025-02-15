<!-- Logo -->
<?php if(function_exists('get_field') && get_field('logo_site_name', 'option')): ?>
  <div class="profile-img">
      <img src="<?= get_field('logo_site_name', 'option')['sizes']['small']; ?>" alt="logo" class="img-fluid  profile-image" >
  </div>
<?php endif; ?>

<div class="d-flex flex-column align-items-center align-items-lg-start">
<!-- Logo Title -->
  <?php if(function_exists('get_field') && get_field('logo_title', 'option')): ?>  
      <a href="<?= home_url(); ?>" class="logo mb-2 d-flex align-items-center justify-content-center">
        <h1 class="sitename"><?= get_field('logo_title', 'option'); ?></h1>
      </a>
  <?php endif; ?>

  <!-- phone number -->
  <?php if(function_exists('get_field') && get_field('phone_number', 'option')): ?>
      <div class="d-flex align-items-center justify-content-center">
          <i class="bi bi-phone"></i>
          <a href="tel:<?= get_field('phone_number', 'option'); ?>" class="logo">
            <span class="sitename"><?= get_field('phone_number', 'option'); ?></span>
          </a>
      </div>
  <?php endif; ?>

</div>

