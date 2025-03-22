<?php 
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$author_id = $object->post_author;
$social_links = get_user_meta($author_id, 'social_links', true);
?>

<div class="wrapper-side">
<?php if(is_array($social_links) && count($social_links) > 0): ?>
<nav id="navmenu-module-socials" class="navmenu navmenu-module-socials" aria-label="Navigation socials">
<ul class="dropdown-menu">
<?php foreach($social_links as $key => $item): ?>
    <li class="">
    <a  class=""
    href="<?=$item?>"
    title="<?=$key?>"
    target="_blank"
    rel="noopener"
    ><?=$key?></a>
    </li>
<?php endforeach; ?>
</ul>
</nav>
<?php endif; ?>
</div>