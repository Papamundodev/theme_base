<?php
$insurances = get_field('insurances', 'option');
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
        "1200": {
            "slidesPerView": 3,
            "spaceBetween": 1
        }
        }
    }
    </script>
    <div class="swiper-wrapper">
        <?php foreach ($insurances as $insurance) : ?>
        <div class="swiper-slide">
            <div class="carrousel-item">
                <div class="carrousel-img">
                    <img src="<?= $insurance['image']['url'] ?>" alt="">
                </div>
                <h4><?= $insurance['name'] ?></h4>
            </div>
        </div><!-- End carrousel item -->
        <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>