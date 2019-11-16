<?php

get_header(); 

?>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post() ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php else : ?>
         <?php get_template_part( 'no-results', 'index' ); ?>
    <?php endif; ?> 

<?php get_footer();
