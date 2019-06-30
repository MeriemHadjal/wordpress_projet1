<?php
/**
* Template Name: Disco
*/

get_header(); ?>

<?php $loop = new WP_Query( array( 'post_type' => 'vinyles',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'type_musicaux',
                                            'field' => 'slug',
                                            'terms' => 'disco'
                                        )
                                    )
                                     ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
       <a href="<?php the_permalink() ?>"><h1><?php the_title() ?></h1></a>
       <?php the_content() ?>
<?php endwhile; wp_reset_query(); ?>


<?php get_footer(); ?>


