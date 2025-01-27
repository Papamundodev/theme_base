<?php
if(function_exists('get_field')){$insurances = get_field('insurances', 'option');}
?>
<div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
    {
        "loop": true,
        "speed": 600,
        "autoplay": {
        "delay": 5000
        },
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
            "slidesPerView": 4,
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
                    <h4><?= $insurance['name'] ?></h4>
                </div>
                </div><!-- End carrousel item -->
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>