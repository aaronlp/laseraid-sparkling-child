<?php
/*
Template Name: About us
*/
get_header(); ?>
</div>
</div>		
</div>	
<div class="pageBody">
<div class="pageTop clearfix">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				?>
                 <figure class="topImg">
                <?php the_post_thumbnail(); ?>
                </figure>
                <aside class="pageTexts clearfix">
                <div class="txts">
				<?php the_content(); ?>
                </div>
                </aside>
               
                 <?php   
				endwhile;
			?>


</div>
</div>
<div class="row-full news-testimonials counters">
        <div class="container">
        <h1><span> Australia and New Zealand's most trusted Supplier </span></h1>
        <aside class="col-md-4">
            <i class="fa fa-trophy"></i>
             <h2>1</h2>
            <h3>We are now Australia's leading supplier<br/>to the cosmetic industry. </h3>
        </aside>
        <aside class="col-md-4">
            <i class="fa fa-users"></i>
            <h2 class="timer count-title counter" >400</h2>
            <h3>Over 400 clients across<br/>
                Australia & New Zealand</h3>
        </aside>
        <aside class="col-md-4">
            <i class="fa fa-check-square-o"></i>
            <h2 class="timer count-title counter">500</h2>
            <h3>Over 500 devices in the safe hands of<br/>
                our highly trained technicians.</h3>
        </aside>
       
</div>
</div>
<section class="support">
	<div class="container">
		<?php echo the_field('we_understand'); ?>
      	</div>
</section>

<?php get_footer(); ?>