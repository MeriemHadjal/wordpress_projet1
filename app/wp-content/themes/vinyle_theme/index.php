<?php get_header(); ?>
<div class="row">
<div class="col-sm-8 blog-main">
<?php
?>

<div id="slider">
   <div id="prevSlide">
      <img src="previous.jpg" />
   </div>

   <div id="slider-window">
      <ul id="slides">
         <?php query_posts('posts_per_page=5&meta_key=thumb&meta_compare=!=&meta_value= ');
         while ( have_posts() ) : the_post(); ?>
            <li>
               <img src="<?php echo get_post_meta($post->ID, 'thumb', true) ?>" />
               <div>
                  <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                  <?php the_excerpt(); ?>
               </div>
            </li>
         <?php endwhile;
         wp_reset_query();?>
      </ul>
   </div><!-- #slider-window -->

   <div id="nextSlide">
      <img src="next.jpg" />
   </div>
</div><!-- #slider -->
<!--
// if ( have_posts() ) : while ( have_posts() ) : the_post();
// get_template_part( 'content', get_post_format() ); 
// endwhile; endif;
// if ( have_posts() ) : while ( have_posts() ) : the_post();
// get_template_part( 'article', get_post_format() ); 
// endwhile; endif;
?>

</div> --><!-- /.blog-main -->
<!-- #################scroll############### -->

<?php 

if ( have_posts() ) : while ( have_posts() ) : the_post();

        // Si vous avez besoin d'accéder à $post->ID par exemple
        global $post;

        get_template_part('vinyle');
        
       // OU
      include(locate_template('single.php'));
      // si vous avez besoin d'accéder aux variables dans le template
endwhile; endif;

 get_sidebar(); ?>
</div><!-- /.row -->
<?php get_footer(); ?>

