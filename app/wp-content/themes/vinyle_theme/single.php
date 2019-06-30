<?php
get_header();
?>
<section class="single_vinyle">
  <div class="container-fluid">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div>
          <div class="container">
            <div class="row">
              <div class="col-12">
                <h2><?php the_title(); ?></h2>
              </div>
              <div class="row">
                <div class="album_pochette" class="col-6">
                  <?php the_post_thumbnail(array(300, 300)); ?>
                </div>
                <div class="metabox_vinyle" class="col-6">
                  <?php
                  ######################  metabox    ###############################
                  echo '<label class="album_title" > Titre de l\'album : </label>';
                  echo get_post_custom($post->ID, '_album_title', true)['_album_title'][0];
                  echo '</br>';
                  echo '<label class="pochette" > Pochette : </label>';
                  echo get_post_custom($post->ID, '_pochette', true)['_pochette'][0];
                  echo '</br>';
                  echo '<label class="date_de_sortie" > Date : </label>';
                  echo get_post_custom($post->ID, '_date', true)['_date'][0];
                  echo '</br>';
                  echo '<label class="pressage" > Pressage : </label>';
                  echo get_post_custom($post->ID, '_pressage', true)['_pressage'][0];
                  echo '</br>';
                  echo '<label class="label" > Label : </label>';
                  echo get_post_custom($post->ID, '_label', true)['_label'][0];
                  echo '</br>';
                  echo '<label class="num_identification" > Numéro d\'identification : </label>';
                  echo get_post_custom($post->ID, '_identification', true)['_identification'][0];
                  echo '</br>';
                  echo '<label class="style" > Style : </label>';
                  echo get_post_custom($post->ID, '_style', true)['_style'][0];
                  echo '</br>';
                  echo '<label class="duree" > Durée : </label>';
                  echo get_post_custom($post->ID, '_duree', true)['_duree'][0];
                  echo '</br>';
                  echo '<label class="prix" > Prix : </label>';
                  echo get_post_custom($post->ID, '_prix', true)['_prix'][0];
                  echo '</br>';
                  echo '<label class="description" > Description : </label>';
                  echo get_post_custom($post->ID, '_description', true)['_description'][0];
                  echo '</br>';
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="clo-12">
                  <div>
                    <p><?php the_excerpt(); ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
</section>
<?php
get_footer();
?>