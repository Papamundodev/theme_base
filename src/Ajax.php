<?php

namespace moon;

class Ajax {


    /*
     * create note ajax
     * @return void
     * find action in main.js and call this method
     */

    public function initCreatePost() :void
    {
        add_action('wp_ajax_create_post', [$this, 'ajaxCreatePost']);
        add_action('wp_ajax_nopriv_create_post', [$this, 'ajaxCreatePost']);
    }

    public function ajaxCreatePost() :void
    {
        $action = $_POST['action'] ?? null;
        $card_id = $_POST['card_id'] ?? null;
        $card_name = $_POST['card_name'] ?? null;
        $card_desc = $_POST['card_desc'] ?? null;
        $card_arcane = $_POST['card_arcane'] ?? null;
        
        if (empty($card_id)) {
            wp_send_json_error('Post is required');
        }

        $current_cards = get_posts([
            'post_type' => 'card',
            'meta_key' => 'card_id',
            'meta_value' => $card_id,
            'post_status' => 'publish',
        ]);

        if ($current_cards) {
            wp_send_json_error('Card already exists');
        } else {
            $post_id = wp_insert_post([
                'post_title'    => $card_name,
                'post_content'  => $card_desc,
                'post_status'   => 'publish',
                'post_type'     => 'card',
            ]);
            update_post_meta($post_id, 'card_id', $card_id);
            wp_set_object_terms($post_id, $card_arcane, 'arcanes');
        }

        ob_start();
        ?>

        <?php
        wp_send_json_success(ob_get_clean());
        wp_reset_query();
        wp_die();    
    }

}



