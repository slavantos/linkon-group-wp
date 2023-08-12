<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2>Сумма заказа</h2>

	<div class="cart_totals__list">
		<div class="cart_totals__list-item cart-subtotal">
			<div class="cart_totals__list-item__name">
				<?php esc_html_e( 'Subtotal', 'woocommerce' ); ?>
			</div>
			<div class="cart_totals__list-item__val" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
				<?php wc_cart_totals_subtotal_html(); ?>
			</div>
		</div>
		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="cart_totals__list-item cart-subtotal cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<div class="cart_totals__list-item__name">
					<?php wc_cart_totals_coupon_label( $coupon ); ?>
				</div>
				<div class="cart_totals__list-item__val" data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>">
					<?php wc_cart_totals_coupon_html( $coupon ); ?>
				</div>
			</div>
		<?php endforeach; ?>
		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
		<div class="cart_totals__list-item order-total">
			<div class="cart_totals__list-item__name">
				<?php esc_html_e( 'Total', 'woocommerce' ); ?>
			</div>
			<div class="cart_totals__list-item__val"  data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
				<?php wc_cart_totals_order_total_html(); ?>
			</div>
		</div>
		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
	</div>

	<div class="wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
