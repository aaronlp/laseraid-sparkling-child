<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
/*wc_print_notices();*/

/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action( 'woocommerce_before_main_content' );
?>

<?php /*if ( apply_filters( 'woocommerce_show_page_title', true ) ) : */?><!--

	<h1 class="page-title"><?php /*woocommerce_page_title(); */?></h1>

--><?php /*endif; */?>
<section class="main-content product-page">
	<div class="wrapper">
		<?php wc_print_notices(); ?>

		<div id="primary" class="product-page">
			<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
			?>

			<?php if ( have_posts() ) : ?>

				<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>
				<div class="bulk-add-to-cart">
					<button>Add to cart</button>
				</div>
				<div class="clear"></div>
				<table  class="listing" cellspacing="0">
					<thead>
					<tr class="">
						<th class="title" colspan="2">Product Name</th>
						<th class="pa_comments">Description</th>
						<th class="price">Unit Price (Ex. GST)</th>
						<th class="quantity">Quantity</th>
					</tr>
					</thead>

					<tbody>
					<?php $catname = ''; ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php $currentpcat = get_the_terms( get_the_ID(), 'product_cat' ); ?>
						<?php if($catname != $currentpcat[0]->name): ?>
							<tr >
								<td colspan="8"><h2 class="product-cat"><?php echo $currentpcat[0]->name; ?></h2></td>
							</tr>
							<?php $catname = $currentpcat[0]->name; ?>
						<?php endif; ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>
					</tbody>
				</table>
				<div class="bulk-add-to-cart">
					<br/><button>Add to cart</button>
				</div>
				<div class="clear"></div>
				<?php woocommerce_product_loop_end(); ?>

				<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
				?>

			<?php elseif ( ! woocommerce_product_subcategories( array(
				'before' => woocommerce_product_loop_start( false ),
				'after'  => woocommerce_product_loop_end( false )
			) )
			) : ?>

				<?php wc_get_template( 'loop/no-products-found.php' ); ?>

			<?php endif; ?>

			<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
			?>


		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</section>


<?php get_footer( 'shop' ); ?>
