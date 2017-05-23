<?php

/*

Template Name: Page main page

*/

get_header(); ?>



		<div id="content" class="site-content wel-come-text" role="main">

		

			<?php

				// Start the Loop.

				while ( have_posts() ) : the_post();



					// Include the page content template.

					get_template_part( 'content', 'page' );



					// If comments are open or we have at least one comment, load up the comment template.

					if ( comments_open() || get_comments_number() ) {

						comments_template();

					}

				endwhile;

			?>

		</div><!-- #content -->

</div>		

</div>	





<div class="row-full news-testimonials">

        <div class="container">

        <h1><span>Australia's Most Trusted Supplier</span></h1>

        

        <?php 

			$args = array( 'post_type' => 'post', 'posts_per_page' => 3 );

			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post();

	?>



	

		<div class="col-md-3">

        	<div class="post-box">

            <figure style="background-image:url(<?php echo the_post_thumbnail_url(); ?>)">

            <a href="<?php echo get_permalink(); ?>"></a></figure>

            <div class="texts">

                <span class="date"><i><?php echo get_the_date('F d, Y'); ?></i></span>

                <h2><a class="moduleItemTitle" href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h2>

                <?php the_excerpt(10);?>

             <?php /*?> <a class="readmore" href="<?php echo get_permalink(); ?>">&gt; read more</a><?php */?>

            </div>

            </div>

        </div>

        <?php endwhile; ?>





	

		<div class="col-md-3">

        	<div class="post-box">

            <figure style="background-image:url('http://staging.laseraid.com.au/wp-content/uploads/2017/03/184b7cb84d7b456c96a0bdfbbeaa5f14_M.jpg');background-size:70% 70%;">

            <a href="<?php bloginfo(url); ?>/testimonials"></a></figure>

            <div class="texts">
	            <p style="font-size:17px;">Laser Clinics Australia is Australia's largest chain...</p>
                <b>Kate - Franchisee Laser Clinics Australia</b><br/><br/><br/>

             <?php /*?> <a class="readmore" href="<?php echo get_permalink(); ?>">&gt; read more</a><?php */?>
             	<a style="font-weight:bold;color:#000000;clear:both;margin-top:15px;" href="<?php bloginfo(url); ?>/testimonials">> More</a>
            </div>

            </div>

        </div>

        
        
        	

        </div>

</div>












<?php get_footer(); ?>