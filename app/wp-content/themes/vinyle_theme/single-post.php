<?php

get_header();
?>
</div>
<div class="container-fluid">
<div class="container">
  <div class="row">
    <div class="col-12" class="article_actu">
<h1><?php the_title() ?></h1>
<?php
if ( has_post_thumbnail() ) { // Vérifies qu'une miniature est associée à l'article.
  the_post_thumbnail();
}?>
 <!-- <?php echo(get_the_post_thumbnail()) ?> -->
<p><?php echo(get_the_excerpt()) ?></p>
</div>
</div>
</div>
</div>
<?php
get_footer();

?>