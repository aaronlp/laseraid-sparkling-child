<?php
/**
 * The Sidebar widget area for footer.
 *
 * @package sparkling
 */
?>
<?PHP
				if ( is_front_page() ) 
				{
				?>	

	<?php
	// If footer sidebars do not have widget let's bail.

	if ( ! is_active_sidebar( 'footer-widget-1' ) && ! is_active_sidebar( 'footer-widget-2' ) && ! is_active_sidebar( 'footer-widget-3' ) )
		return;
	// If we made it this far we must have widgets.
	?>

	<div class="footer-widget-area">
		<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
		<div class="col-sm-4 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-1' ); ?>
		</div><!-- .widget-area .first -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
		<div class="col-sm-4 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-2' ); ?>
		</div><!-- .widget-area .second -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
		<div class="col-sm-4 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-3' ); ?>
		</div><!-- .widget-area .third -->
		<?php endif; ?>
	</div>
	
	
	<?PHP
	}
	else
	{
	?>
	<div class="footer-widget-area">
		<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
		<div class="col-sm-3 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-1' ); ?>
		</div><!-- .widget-area .first -->
		<?php endif; ?>
		
		<div class="col-sm-3 footer-widget" role="complementary">
			<h3 class="widgettitle">News</h3>
			<?php echo do_shortcode('[psc_print_post_slider_carousel]'); ?>
			<a class="bottom-more" href="<?php bloginfo('url');?>/news-media">> More</a>
		</div><!-- .widget-area .first -->
		
		<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
		<div class="col-sm-3 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-2' ); ?>
		</div><!-- .widget-area .second -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
		<div class="col-sm-3 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-3' ); ?>
		</div><!-- .widget-area .third -->
		<?php endif; ?>
	</div>
	<?PHP
	}
	?>