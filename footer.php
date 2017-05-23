<?php

/**

 * The template for displaying the footer.

 *

 * Contains the closing of the #content div and all content after

 *

 * @package sparkling

 */

?>

		</div><!-- close .row -->

	</div><!-- close .container -->

</div><!-- close .site-content -->


	<?PHP 
	if(is_page('15'))
	{
	?>
    <div class="sliderBottom">
    <div class="wrapper clearfix">
        <aside class="">
            <h3>
	            <a href="<?php bloginfo(url); ?>/info-pack/">Click here</a> to Receive Your Info Pack.
            </h3>
        </aside>
        <!-- <div class="link floatRight">

        </div> -->
    </div>


</div>
<?PHP
}
?>

<?php $twitter = createTwitterFeedArray(); ?>

<section class="tweetFeed">
    <div class="module ">
        <div id="wds-container">
            <div id="wds" class="wrapper">
                <div class="icon">
                    <i class="fa fa-twitter"></i>
                </div>
                <div id="wds-tweets" class="owl-carousel owl-theme">
                    <?php
                        for ($x = 0; $x < count($twitter); $x++) {
                            echo '<div class="item">';
                            echo '<div class="wds-tweet-container' . ($x == count($twitter) - 1 ? ' wds-last' : '') . '">';
                            echo '<div class="wds-tweet">' . $twitter[$x]->formatted_text . '</div>';
                            echo '<div class="wds-tweet-data">';
                            echo '<a href="https://twitter.com/' . $twitter[$x]->user->screen_name . '/statuses/' . $twitter[$x]->id_str . '" target="_blank" rel="noreferrer noopener">';
                            echo date('M d', strtotime($twitter[$x]->created_at));
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

	<div id="footer-area">
    

		<div class="container footer-inner">

			<div class="row">
					<?php get_sidebar( 'footer' ); ?>
				
			</div>

		</div>



		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="site-info container">

				<div class="row">

					<?php if( of_get_option('footer_social') ) sparkling_social_icons(); ?>

					<?php /*?><nav role="navigation" class="col-md-6">

						<?php sparkling_footer_links(); ?>

					</nav><?php */?>

					<div class="copyright col-md-12 text-center">

						<?php echo of_get_option( 'custom_footer_text', 'sparkling' ); ?>

						<?php // sparkling_footer_info(); ?>

					</div>

				</div>

			</div><!-- .site-info -->

			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->

		</footer><!-- #colophon -->

	</div>

</div><!-- #page -->

<div id="enquire" class="hide mainForm">
<div class="container">
	<h1>
            <span>Enquire Now</span>
        </h1>
</div>
	<?php echo do_shortcode('[contact-form-7 id="99" title="Contact form 1"]'); ?>
</div>

<?php wp_footer(); ?>
<div class="popup-overlay"></div>
<div class="popup-wrapper add-to-cart-response">
    <a class="close"><i class="fa fa-close"></i></a>
    <div class="popup-container">

    </div>
</div>
</body>

</html>