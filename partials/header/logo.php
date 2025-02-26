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

<?php if(function_exists('get_field')) : ?>
  <?php
  $portal_link = get_field('portal_link', 'option');
  $portal_link_text = get_field('portal_link_text', 'option') ?? __('Patient Portal', 'theme_base');
  ?>
  <?php if($portal_link) : ?>
      <a href="<?=$portal_link['url']?>" class="text-decoration-none btn btn-primary ms-xxl-5" target="<?=$portal_link['target']?>" rel="<?= $portal_link['target'] === '_blank' ? 'noopener noreferrer' : '' ?>">
        <div class="d-flex flex-column">
            <p class="mb-0"><?=$portal_link_text?></p>
        </div>
      </a>
  <?php endif; ?>
<?php endif; ?>

