<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices(); ?>

<p class="myaccount_user">
	<?php
	printf( __( 'Hello <strong>%1$s</strong>.', 'woocommerce' ) . ' ', get_user_meta($current_user->ID,'first_name',true) );

	printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce' ),
		wc_customer_edit_account_url()
	);
	?>
</p>
<h3>Account Information <a href="<?php echo wc_customer_edit_account_url(); ?>">(Edit)</a></h3>
<div class="name-email">
    <p><?php echo get_user_meta($current_user->ID,'first_name',true) . ' ' . get_user_meta($current_user->ID,'last_name',true) ?></p>
    <p><?php echo $current_user->user_email; ?></p>
</div>
<?php do_action( 'woocommerce_before_my_account' ); ?>

<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php do_action( 'woocommerce_after_my_account' ); ?>
