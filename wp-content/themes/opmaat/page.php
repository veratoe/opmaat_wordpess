<?php

get_header(); 

?>
	<div style="margin-top: 400px">
    	<?php if ( have_posts() ) : ?>
        	<?php while ( have_posts() ) : the_post() ?>
           		<div class="container">
					<section>

						<div class="row">
                            <div class="col-lg-2 d-none d-sm-block "></div>
                            <div class="col-lg-10 m-3" style="color: white; font-size: 20px;">
		 						<h1 class="amatic text-left"><?php the_title(); ?></h1>
								<?php the_content(); ?>
							</div> 

                            <div class="col d-none d-sm-block "></div>
                        </div>
					</section>
				</div>
        	<?php endwhile; ?>
    	<?php endif; ?>
	</div> 

<?php get_footer();
