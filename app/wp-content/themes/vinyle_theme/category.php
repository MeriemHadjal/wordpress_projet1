<?php

get_header();

?>

</div> <!-- =>car on est avec boostrap -->
<div class="row">
<div class="col-12">
    <div id="actu" class="d-flex flex-wrap" data-url="<?php echo get_rest_url(null,'/wp/v2/posts'); ?>" data-categoryID="<?php echo get_query_var('cat'); ?>">
    <!-- Liste des articles -->
    </div>
         
    </div>
</div>
</section>
<?php
get_footer();
?>
</body>