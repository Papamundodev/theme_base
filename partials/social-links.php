<div class="social-links text-center">
    <?php if(get_field('twitter_account', 'option')): ?>
        <a href="<?= esc_url(get_field('twitter_account', 'option')); ?>" class="twitter" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-twitter"></i>
        </a>
    <?php endif; ?>

    <?php if(get_field('facebook_account', 'option')): ?>
        <a href="<?= esc_url(get_field('facebook_account', 'option')); ?>" class="facebook" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-facebook"></i>
        </a>
    <?php endif; ?>

    <?php if(get_field('linkedin_account', 'option')): ?>
        <a href="<?= esc_url(get_field('linkedin_account', 'option')); ?>" class="linkedin" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-linkedin"></i>
        </a>
    <?php endif; ?>

    <?php if(get_field('instagram_account', 'option')): ?>
        <a href="<?= esc_url(get_field('instagram_account', 'option')); ?>" class="instagram" target="_blank" rel="noopener noreferrer">
            <i class="bi bi-instagram"></i>
            </a>
    <?php endif; ?>
</div>