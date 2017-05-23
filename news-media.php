<?php

/*

Template Name: News Media

*/

get_header(); ?>



        

        <?php 

			$args = array( 'post_type' => 'post', 'posts_per_page' => 12, 'paged' => $paged );

			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post();

	?>



	

		<div class="col-md-6" style="">

        	<div class="post-box">

            <figure style="background-image:url(<?php echo the_post_thumbnail_url(); ?>)">

            <a href="<?php echo get_permalink(); ?>"></a></figure>

            <div class="texts">

				<span class="entry-date"><?php echo get_the_date(); ?></span>

                <h2><a class="moduleItemTitle" href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h2>

                <?php the_excerpt(8);?>

             <?php /*?> <a class="readmore" href="<?php echo get_permalink(); ?>">&gt; read more</a><?php */?>

            </div>

            </div>


        </div>




        <?php endwhile; ?>


            <div class="k2Pagination">
                     <?php
                     echo paginate_links( array(
                        'current' => max(1, get_query_var('paged')),
                        'total' => $loop->max_num_pages,
                        'base' => get_pagenum_link(1) . '%_%',  
                        'format' => 'page/%#%',
                        'end_size'           => 9,
                        'prev_text'          => 'Prev',
                        'next_text'          => 'Next',
                    ) );
                    ?>  
            </div>

<?php 

get_sidebar();

get_footer();



?>