<?php

/*

Template Name: Testimonial

*/

get_header(); ?>



		

</div>		

</div>	



        <div class="container testiomialPage">
		<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				?>
				<?php the_content(); ?>
                 <?php   
				endwhile;
			?>
        <?php 
			$args = array( 'post_type' => 'testimonial', 'orderby=title&order=ASC' => 5 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<div class="col-md-12 quote clearfix">

        	<div class="">

            <div class="col-md-3">

                 <img src="<?php echo the_post_thumbnail_url(); ?>" alt="laseraid" width="205" height="66">

            </div>

            <div class="col-md-9">

            <div class="detail">

                <h1><?php echo the_title(); ?></h1>

                <?php the_content();?>

             <?php /*?> <a class="readmore" href="<?php echo get_permalink(); ?>">&gt; read more</a><?php */?>

            </div>

            </div>

            </div>

        </div>

        <?php endwhile; ?>

        	

        </div>

</div>









<?php get_footer(); ?>