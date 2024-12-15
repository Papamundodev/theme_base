<?php
global $wp_query;
$wp_query   = $args['display']['query'] ?? $wp_query;

$next_post = get_next_posts_page_link();
$previous_post = get_previous_posts_page_link();
$paged = get_query_var( 'paged' ) ?? 1;
$max_num_page = intval($wp_query->max_num_pages);
?>
<?php if ($max_num_page > 1) : ?>

    <div class="container">
        <ul class="pagination">
            <?php if ($paged - 1 !== 0 && $paged !== 0) : ?>
                <li class="page-item">
                    <a href="<?=get_pagenum_link(1)?>" class="page-link py-0 px-2 h-100">
                        <img src="<?=$icon_double_pagination['url']?>" alt="">
                    </a>
                </li>
                <li class="page-item">
                    <a href="<?=$previous_post?>" class="page-link page-next-previous py-0 ps-2 h-100">
                        <img src="<?=$icon_pagination['url']?>" alt="">
                    </a>
                </li>
            <?php endif;?>
            <?php

            $pagination = \Complus\Theme::complus_pagination( $wp_query );
            $current_page = null;
            $max_num_page = intval($wp_query->max_num_pages);
            $min_num_page = 1 ;
            $space_link_allowed = 1 ;
            foreach ($pagination as $page) {
                if ($page->isCurrent) {
                    $current_page = $page->page;
                    break;
                }
            }
            $links_to_show = array_filter($pagination, function ($link) use ($current_page, $max_num_page, $min_num_page, $space_link_allowed) {
                return ($link->page <= $current_page + $space_link_allowed && $link->page >= $current_page - $space_link_allowed) || ($link->page == $max_num_page) || ($link->page == $min_num_page) ;
            })
            ?>
            <?php foreach( $links_to_show as  $link ) : ?>
                <li class="page-item <?=$link->isCurrent ? 'active' : ""?> ">
                    <a href="<?php esc_attr_e( $link->url ) ?>" class="page-link">
                        <?php _e( $link->page ) ?>
                    </a>
                </li>
            <?php endforeach; ?>

            
            <?php if (intval($paged) !== intval($max_num_page)) : ?>
                <li class="page-item">
                    <a href="<?=$next_post?>" class="page-link page-next-previous py-0 pe-2 h-100">
                        <img class="img-reverse" src="<?=$icon_pagination['url']?>" alt="">
                    </a>
                </li>
                <li class="page-item">
                    <a href="<?=get_pagenum_link($max_num_page)?>" class="page-link py-0 px-2 h-100">
                        <img class="img-reverse" src="<?=$icon_double_pagination['url']?>" alt="">
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>


<?php endif;?>


