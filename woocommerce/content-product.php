<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 2 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
//$woocommerce_loop['loop'] ++;

// Extra post classes
$classes = array();
/*if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}*/
?>
<tr <?php post_class( $classes ); ?>>

	<td class="column thumbnail">
		<?php wc_get_template( 'loop/sale-flash.php' ); ?>
		<a href="<?php echo get_the_permalink(); ?>" class="woocommerce-LoopProduct-link">
			<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" />
		</a>
	</td>

	<td class="column title"  data-title="Product name">
		<a href="<?php echo get_the_permalink(); ?>" class="woocommerce-LoopProduct-link">
			<?php echo get_the_title(); ?>
		</a>
	</td>

	<td class="column pa_comments"  data-title="Description">
		<?php echo $product->post->post_excerpt; ?>
	</td>

	<?php /*$attributes = $product->get_attributes(); $unit_found = $comment_found = false; */?><!--
	<?php /*asort($attributes); */?>
	<?php /*foreach( $attributes as $attribute): */?>
		<?php
/*		if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
			continue;
		} else {
			$has_row = true;
		}
		if( $attribute['name'] == 'pa_unit' || $attribute['name'] == 'pa_comments' ){
			if ( $attribute['is_taxonomy'] ) {
				$values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
				echo '<td class="column '. $attribute['name'] .'"  data-title="Thum">';
				echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
				echo '</td>';
			} else {
				// Convert pipes to commas and display values
				$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
				echo '<td class="column '. $attribute['name'] .'" >';
				echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
				echo '</td>';
			}
			(!$unit_found && $attribute['name'] == 'pa_unit') ? $unit_found = true : $unit_found = $unit_found;
			(!$comment_found && $attribute['name'] == 'pa_comments') ? $comment_found = true : $comment_found = $comment_found;
		}
		*/?>
	<?php /*endforeach; */?>
	<?php /*if(!$comment_found): */?>
		<td class="column pa_comments"  data-title="Comments"></td>
	<?php /*endif; */?>

	<?php /*if(!$unit_found): */?>
		<td class="column pa_unit"  data-title="Unit"></td>
	--><?php /*endif;*/ ?>

	<td class="column price"  data-title="Unit Price (Ex. GST)">
		<?php wc_get_template( 'loop/price.php' ); ?>
	</td>

	<td class="column quantity hide-add-btn"  data-title="Quantity">
		<?php woocommerce_template_single_add_to_cart(); ?>
	</td>

</tr>