<section>
    <div class="wrapper-command-mobile wrapper">
        <button class="open-module btn" popovertarget="module-categories-related">
            <?php
            $object = get_queried_object();
            $get_term_id = wp_get_post_terms($object->ID, 'category');
            ?>
            <?php if(is_array($get_term_id) && count($get_term_id) > 0 && is_single()): ?>
                <?php foreach($get_term_id as $term): ?>
                    <span><?=$term->name?></span>
                <?php endforeach; ?>
            <?php else: ?>
                <span>Categories</span>
            <?php endif; ?>
        </button>

        <?php if(is_single()): ?>
        <button class="open-module btn" popovertarget="module-breadcrumbs">
            <p>You are here</p>
        </button>
        <?php endif; ?>
        
        <button class="open-module btn" popovertarget="module-most-viewed">
            <p>Most viewed</p>
        </button>

        <?php if(is_single()): ?>
        <button class="open-module btn" popovertarget="module-author-info">
            <p>Author info</p>
        </button>
        <?php endif; ?>

        <button class="open-module btn" popovertarget="module-most-popular-posts">
            <p>Most popular posts</p>
        </button>
        <button class="open-module btn" popovertarget="module-topics">
            <p>Topics</p>
        </button>
        
        <?php if(is_single()): ?>
        <button class="open-module btn" popovertarget="module-join-us">
            <p>Join us</p>
        </button>
        <?php endif; ?>
    </div>
</section>