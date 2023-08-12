<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

	<div class="single-product-main">
		<h1 class="single-product-title">
			<?php the_title(); ?>
		</h1>
		<div class="single-product__head">
			<div class="single-product__grid">
				<div class="single-product__grid-left">
					<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>
						<div class="single-product__article">
							<span class="sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>
						</div>
					<?php endif; ?>
				</div>
				<div class="single-product__grid-mid">
					<?php
					$args = array(
						'object_ids' => array($product->id),
					);
					$terms = get_terms('product_cat', $args);

					if ($terms) {
						foreach ($terms as $term) {
							$warranty = get_field('warranty', 'product_cat_' . $term->term_id);
							if ($warranty) { ?>
								<div class="single__warranty">
									<div class="title">
										<?php echo 'Гарантия производителя ' . get_field('warranty', 'product_cat_' . $term->term_id); ?>
									</div>
								</div>
						<?php break;
							}
						} ?>
					<?php } ?>
				</div>
				<div class="single-product__grid-right">
					<?php
					if ($product->stock_status == 'instock') {
						echo '<div class="single-product__stock instock">В наличии ' . $product->stock . '</div>';
					} else {
						echo '<div class="single-product__stock outstock">Нет в наличии</div>';
					}
					?>
					<?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>
				</div>
			</div>
		</div>
		<div class="single-product__body">
			<div class="single-product__grid">
				<div class="single-product__grid-left">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action('woocommerce_before_single_product_summary');
					?>
				</div>
				<div class="single-product__grid-mid">
					<div class="attributes">
							<?php
							$attributes = $product->get_attributes();
							$i = 0;
							foreach ($attributes as $attribute) :
								
								if($i>7) {
									echo '<div class="row"><a href="#attributes" class="all-attr">Все характеристики</a></div>';
									break;
								}
								$i++;
								if (empty($attribute['name'] != 'dimensions' && $attribute['name'] != 'weight' && $attribute['name'] != 'pa_brendy' && $attribute['is_visible']) || ($attribute['is_taxonomy'] && !taxonomy_exists($attribute['name'] ))  ) {
									continue;
								} else {
									$has_row = true;
								}
							?>
								<div class="row">
									<div class="name"><?php echo wc_attribute_label($attribute['name']) . ':'; ?></div>
									<div class="value"><?php
										if ($attribute['is_taxonomy']) {

											$values = wc_get_product_terms($product->id, $attribute['name'], array('fields' => 'names'));
											echo apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);
										} else {

											// Convert pipes to commas and display values
											$values = array_map('trim', explode($product->id, $attribute['value']));
											echo apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);
										}
										?></div>
								</div>
							<?php endforeach;  ?>
					</div>
				</div>
				<div class="single-product__grid-right">
					<div class="single-product__price">
						<?php woocommerce_template_loop_price(); ?>
						<?php
						$product = wc_get_product(get_the_ID());
						if (!$product->is_sold_individually() && 'variable' != $product->product_type && $product->is_purchasable()) {
							woocommerce_quantity_input(array('min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity()));
						}
						?>
						<?php
						/**
						 * Hook: woocommerce_after_shop_loop_item.
						 *
						 * @hooked woocommerce_template_loop_product_link_close - 5
						 * @hooked woocommerce_template_loop_add_to_cart - 10
						 */
						do_action('woocommerce_after_shop_loop_item');
						?>
						<div class="delivery-item">
							<a href="/delivery-and-payment/#pickup" target="_blank" class="pickup"><span>Самовывоз</span></a>
						</div>
						<div class="delivery-item">
							<a href="/delivery-and-payment/#courier" target="_blank" class="delivery"><span>Курьером</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="single-description__row" id="attributes">
		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15 --- delete
		 * @hooked woocommerce_output_related_products - 20 ---delete
		 */
		do_action('woocommerce_after_single_product_summary');
		?>
		<div class="single-add-info">
			<div class="manufacturer">
				<h4 class="title">
					Производитель
				</h4>
				<?php $attribute_names = array('pa_brendy');
				foreach ($attribute_names as $attribute_name) {
					$taxonomy = get_taxonomy('pa_brendy');

					if ($taxonomy && !is_wp_error($taxonomy)) {
						$terms = wp_get_post_terms($post->ID, $attribute_name);
						$terms_array = array();
						if (!empty($terms)) {
							foreach ($terms as $term) {
								// echo $term->name;
								echo '<div class="hint">i<div class="description"><div class="content">' . $term->description . '</div></div></div>';
								echo '<div class="logo"><img src="' . get_field('brand_logo', $term) . '"></img></div>';
								echo '<div class="flag-item"><img src="' . get_field('brand_motherland-flag', $term) . '"></img>';
								the_field('brand_motherland-text', $term);
								echo '</div>';
								echo '<div class="flag-item"><img src="' . get_field('brand_production-flag', $term) . '"></img>';
								the_field('brand_production-text', $term);
								echo '</div>';
							}
						}
					}
				} ?>
			</div>
			<?php
			if (get_field('single_equipment')) { ?>
				<div class="equipment">
					<h4>Комплектация</h4>
					<?php the_field('single_equipment'); ?>
				</div>
			<?php }
			?>
			<?php
			if ($product->get_weight() || $product->get_height() || $product->get_width() || $product->get_length()) { ?>
				<div class="packaging-information">
					<h4>
						Информация об упаковке
					</h4>
					<?php
					if ($product->get_weight()) {
						echo '<div class="item"><strong>Вес:</strong> ' . wc_format_localized_decimal($product->get_weight()) . ' ' . esc_attr(get_option('woocommerce_weight_unit')) . '</div>';
					}
					if ($product->get_height()) {
						echo '<div class="item"><strong>Высота:</strong> ' . $product->get_height() . 'см</div>';
					}
					if ($product->get_width()) {
						echo '<div class="item"><strong>Ширина:</strong> ' . $product->get_width() . 'см</div>';
					}
					if ($product->get_length()) {
						echo '<div class="item"><strong>Длина:</strong> ' . $product->get_length() . 'см</div>';
					}

					?>
				</div>
			<?php }
			?>
			<?php
			if (get_field('single_doc-1', get_the_ID())['file'] && get_field('single_doc-1', get_the_ID())['name']) { ?>
				<div class="single__documents">
					<h4>Документация</h4>
					<?php
					for ($i = 1; $i < 6; $i++) {
						$doc = get_field('single_doc-' . $i, get_the_ID());

						if ($doc['file'] && $doc['name']) : ?>
							<a href="<?php echo $doc['file']; ?>" class="item">
								<span><?php echo $doc['name'] ?></span>
							</a>
					<?php
						endif;
					} ?>
				</div>
			<?php }
			?>
		</div>
	</div>
</div>

<?php $crosssell_ids = get_post_meta(get_the_ID(), '_crosssell_ids');

if (!empty($crosssell_ids)) {

	$crosssell_ids = $crosssell_ids[0];

	if (count($crosssell_ids) > 0) { ?>

		<div class="cross-sells">

			<h2><?php _e('С этим товаром берут', 'woocommerce') ?></h2>

			<div class="swiper woocommerce cross-sells-swiper">
				<div class="products swiper-wrapper">
					<?php
					$args = array(
						'post_type' => 'product',
						'ignore_sticky_posts' => 1,
						'no_found_rows' => 1,
						'posts_per_page' => 12,
						'orderby' => 'none',
						'post__in' => $crosssell_ids,
					);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) :
						$loop->the_post(); ?>
						<div class="item swiper-slide">
							<?php wc_get_template_part('content', 'product'); ?>
						</div>
					<?php endwhile;
					wp_reset_postdata();  ?>
				</div>
			</div>
			<div class="navigation">
				<div class="cross-sells-prev prev"></div>
				<div class="cross-sells-next next"></div>
			</div>

		</div>

<?php

	}

	wp_reset_query();
} ?>

<?php echo do_shortcode('[recently_viewed_products]'); ?>

<?php do_action('woocommerce_after_single_product'); ?>