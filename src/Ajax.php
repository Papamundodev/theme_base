<?php

namespace Theme_base;

class Ajax {


    /*
     * create note ajax
     * @return void
     * find action in main.js and call this method
     */


    public function initSearchAutocomplete() :void
    {
        add_action('wp_ajax_search_autocomplete', [$this, 'ajaxSearchAutocomplete']);
        add_action('wp_ajax_nopriv_search_autocomplete', [$this, 'ajaxSearchAutocomplete']);
    }

    public function ajaxSearchAutocomplete() {
        // Verify nonce for security
        check_ajax_referer( 'aas_ajax_nonce', 'security' );
    
        // Get the search term and sanitize it
        $search_term = isset( $_POST['search_term'] ) ? sanitize_text_field( $_POST['search_term'] ) : '';
    
        if ( empty( $search_term ) ) {
            wp_send_json_error( 'Empty search term' );
        }
    
        // Call the search function (defined earlier)
        $post_types_to_search = ['card', 'post', 'page'];
        
        $results = Base::search_posts( $search_term , $post_types_to_search);

        ob_start();
        ?>
        <?php if(!empty($results)) : ?>
            <ul class="search-result-postypes__list">
                <?php foreach ($post_types_to_search as $post_type_selected) : ?>
                    <li class="search-result-postypes__item">
                        <a href="#<?=$post_type_selected;?>" class="search-result-postypes__link">
                            <?=$post_type_selected;?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
            <?php foreach ($results as $post_type => $posts) : ?>
                <?php if (!empty($posts)) : ?>
                    <div id="<?=$post_type;?>" class="layout-cards-1 ">
                        <?php foreach ($posts as $post) : ?>
                            <?php if ($post_type === 'card') : ?>
                                <?php get_template_part('partials/cards/card-preview', null, ['post' => $post]); ?>
                            <?php elseif ($post_type === 'post') : ?>
                                <?php get_template_part('partials/article/post-result-preview', null, ['post' => $post]); ?>
                            <?php endif;?>  
                        <?php endforeach;?>
                    </div>
                <?php else: ?>
                    <div id="<?=$post_type;?>" class="no-result">
                        <p>No result found</p>
                    </div>
                <?php endif;?>
            <?php endforeach;?>
        <?php else: ?>
            <div class="no-result">
                <p>No result found</p>
            </div>
        <?php endif;?>
        <?php
        wp_send_json_success(ob_get_clean());
        wp_reset_query();
        wp_die();

    }
}



