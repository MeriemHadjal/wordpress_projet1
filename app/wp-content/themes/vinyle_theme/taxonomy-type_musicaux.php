<?php
/**
* Template Name: Taxonomy-type_musicaux
*/

get_header(); 

$post_id = $post->ID;
$term = wp_get_post_terms($post_id,'type_musicaux');
?>

</div>
<div class="row">
    <div class="col-12 d-flex flex-wrap">
        <div class="row" id="type_musicaux" data-url="<?php echo get_rest_url(null,'/wp/v2/vinyles_api'); ?>" data-categoryid="<?php echo $term[0]->term_id;?>">
        lol
        </div>
        </div>
        </div>
</section>


<?php get_footer(); ?>


