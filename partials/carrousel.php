<?php
if(function_exists('get_field')){$insurances = get_field('insurances', 'option');}
?>
<?php if(is_array($insurances) && count($insurances) > 5): ?>
<div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
    {
        "loop": true,
        "speed": 600,
        "slidesPerView": "auto",
        "pagination": {
        "el": ".swiper-pagination",
        "type": "bullets",
        "clickable": true
        },
        "breakpoints": {
        "320": {
            "slidesPerView": 1,
            "spaceBetween": 40
        },
        "768": {
            "slidesPerView": 2,
            "spaceBetween": 40
        },
        "1200": {
            "slidesPerView": 3,
            "spaceBetween": 1
        }
        }
    }
    </script>
    
    <div class="swiper-wrapper">
        <?php if(is_array($insurances) && count($insurances) > 0): ?>
            <?php foreach ($insurances as $insurance) : ?>
            <div class="swiper-slide">
                <div class="carrousel-item">
                    <div class="carrousel-img">
                        <img src="<?= $insurance['image']['sizes']['medium'] ?>" alt="">
                    </div>
                    <h3><?= $insurance['name'] ?></h3>
                </div>
                </div><!-- End carrousel item -->
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>


<?php else: ?>
    <div class="section-title" >
        <?php if (function_exists('get_field')){$section_insurances_title = get_field('section_insurances_title', 'option') ?? __('Our Insurances', 'theme_base');}?>
        <h2><?=$section_insurances_title?></h2>
    </div>
    <div class="grid-insurances">
        <?php if(is_array($insurances) && count($insurances) > 0): ?>
            <?php foreach ($insurances as $insurance) : ?>
                <div class="grid-item">
                    <h3><?= $insurance['name'] ?></h3>
                </div>  
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>