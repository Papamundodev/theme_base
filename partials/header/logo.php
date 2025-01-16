
<!-- Logo -->
<?php if(get_field('logo', 'option')): ?>
<div class="profile-img">
    <img src="<?= get_field('logo', 'option')['url']; ?>" alt="<?= get_field('logo', 'option')['alt']; ?>" class="img-fluid rounded-circle">
</div>
<?php endif; ?>

<!-- Logo Title -->
<?php if(get_field('logo_title', 'option')): ?>  
    <a href="<?= home_url(); ?>" class="logo d-flex align-items-center justify-content-center">
      <h1 class="sitename"><?= get_field('logo_title', 'option'); ?></h1>
    </a>
<?php endif; ?>