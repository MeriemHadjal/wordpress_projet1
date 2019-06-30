<?php
/**
* Template Name: Blues
*/

get_header(); ?>

<?php $loop = new WP_Query( array( 'post_type' => 'vinyles',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'type_musicaux',
                                            'field' => 'slug',
                                            'terms' => 'blues'
                                        )
                                    )
                                     ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
       <h1><?php the_title() ?></h1>
       <?php the_content() ?>
<?php endwhile; wp_reset_query(); ?>


<?php get_footer(); ?>



