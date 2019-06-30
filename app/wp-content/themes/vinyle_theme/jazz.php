


<?php
/**
* Template Name: Jazz
*/

get_header(); ?>

<?php $loop = new WP_Query( array( 'post_type' => 'vinyles',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'type_musicaux',
                                            'field' => 'slug',
                                            'terms' => 'jazz'
                                        )
                                    )
                                     ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<h2><?php echo(get_the_date('d-m-y')) ?></h2>
<?php echo(the_content()) ?>
<a href="<?php the_permalink() ?>"><h3><?php echo the_title() ?></h3></a>
<?php echo(the_excerpt()) ?>   

<?php endwhile; wp_reset_query(); ?> 


<?php get_footer(); ?>




