<?php
$object = get_queried_object();
$author_id = $object->post_author;
$author_name = get_the_author_meta('display_name', $author_id);
$author_avatar = get_avatar($author_id, 100);
$author_bio = get_the_author_meta('user_description', $author_id);
$author_posts_url = get_author_posts_url($author_id);
$author_gravatar = get_user_meta($author_id, 'social_links', true);
?>
<div class="wrapper-side">
    <div class="author-info">
        <div class="author-info-avatar"><?=$author_avatar?></div>
        <div class="author-info-name"><?=$author_name?></div>
        <div class="author-info-bio"><?=$author_bio?></div>
        <a href="<?=$author_posts_url?>" class="author-info-posts-url">View all posts</a>
    </div>
</div>