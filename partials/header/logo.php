
<!-- Logo -->
<?php if(get_field('logo', 'option')): ?>
<div class="profile-img">
    <img src="<?= get_field('logo', 'option')['url']; ?>" alt="<?= get_field('logo', 'option')['alt']; ?>" class="img-fluid rounded-circle">
</div>
<?php endif; ?>

<div class="d-flex flex-column">
<!-- Logo Title -->
  <?php if(get_field('logo_title', 'option')): ?>  
      <a href="<?= home_url(); ?>" class="logo mb-2 d-flex align-items-center justify-content-center">
        <h1 class="sitename"><?= get_field('logo_title', 'option'); ?></h1>
      </a>
  <?php endif; ?>

  <!-- phone number -->
  <?php if(get_field('phone_number', 'option')): ?>
      <div class="d-flex align-items-center justify-content-center">
          <i class="bi bi-phone text-primary"></i>
          <a href="tel:<?= get_field('phone_number', 'option'); ?>" class="logo">
            <h1 class="sitename"><?= get_field('phone_number', 'option'); ?></h1>
          </a>
      </div>
  <?php endif; ?>

</div>

