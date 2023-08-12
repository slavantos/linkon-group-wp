<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="product-item">
	<?php if ( $product->is_on_sale() ) { ?>
		<div class="product-item__sale">
			Акция
		</div>
	<?php } ?>
	<div class="nameplates">
		<?php
			do_action('custom_hot_product');
		?>
		<?php
			do_action('custom_top_product');
		?>
		<?php
			do_action('custom_pro_product');
		?>
	</div>
	<a href="<?php the_permalink(); ?>" class="product-item__photo">
		<?php
			the_post_thumbnail();
		?>		
	</a>
	<div class="body">
		<a href="<?php the_permalink(); ?>" class="product-item__title">
			<?php the_title(); ?>
		</a>
		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
			<div class="product-item__article">
				<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
			</div>
		<?php endif; ?>
		<?php if ($product->get_attribute('brendy')) { ?>
			<div class="product-item__brand">
				Производитель: <span><?php echo $product->get_attribute('brendy'); ?></span>
			</div>
		<?php }?>
	</div>
	<div class="foot">
		<div class="product-item__price">
			<?php woocommerce_template_loop_price(); ?>
		</div>
		<div class="product-item__row product-item__row-quantity">
			<?php
				if ($product->stock_status == 'instock') {
					echo '<div class="product-item__stock instock">В наличии ' . $product->stock . '</div>';
				} else {
					echo '<div class="product-item__stock outstock">Нет в наличии</div>';
				}
			?>
			<?php
				$product = wc_get_product( get_the_ID() );
				if ( ! $product->is_sold_individually() && 'variable' != $product->product_type && $product->is_purchasable() ) {
					woocommerce_quantity_input( array( 'min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity() ) );
				}
			?>
			
		</div>
		<div class="product-item__row">
		<?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>
			<?php
				/**
				 * Hook: woocommerce_after_shop_loop_item.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div>
	</div>
</div>