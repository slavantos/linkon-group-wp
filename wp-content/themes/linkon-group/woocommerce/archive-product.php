<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<div class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h2 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h2>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</div>
<div class="category-content">
	<div class="sidebar">
		<?php
			if (!is_product_category( 39 )) {
				if ( function_exists('dynamic_sidebar') ) {
					dynamic_sidebar('homepage-sidebar');
				}
			}
		?>
		<div class="sidebar__brands">
			<h3 class="title">
				Бренды
			</h3>
			<div class="list">
				<?php 
					$parentid = 19;
			
					$args = array(
						'parent' => $parentid,
						// 'number' => 12,
					);
					$i = 1;
					$terms = get_terms( 'product_cat', $args );
					
					if ( $terms ) {
						foreach ( $terms as $term ) {
							$populars = get_field('popular-brand','product_cat_'.$term -> term_id);
							if ($populars && $i <= 12) {
								foreach ($populars as $popular) { 
									$i++; ?>
									<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="item">
										<?php echo $term->name; ?>
									</a>
								<?php }  
							}
						} ?>
				<?php } ?>
			</div>
			<a href="/brands" class="all-brands">Все бренды</a>
		</div>
	</div>
	<div class="body">
		<?php
			if( !is_search() ) { ?>
			<div class="subcategory">
				<?php
				if (is_shop()) {
					$cat_id = 39;
				} else {
					$cat_id = get_queried_object()->term_id;
				}

				$args = array(
					"taxonomy" => "product_cat",
					"parent" => $cat_id,
					'order' => 'DESC',
				);

				$product_categories = get_terms($args);

				foreach ($product_categories as $product_category) {
					$thumbnail_id = get_term_meta($product_category->term_id, "thumbnail_id", true);
					?>

					<a href="<?php echo get_term_link($product_category) ?>">
						<div class="img">
							<img src="<?php echo wp_get_attachment_url($thumbnail_id); ?>" alt="<?php the_title(); ?>">
						</div>
						<h5><?php echo $product_category->name; ?></h5>
					</a>

				<?php } ?>
			</div> 
		<?php }
		?>
		<?php 
		if ( woocommerce_product_loop() ) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );

			woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action( 'woocommerce_shop_loop' );

					wc_get_template_part( 'content', 'product' );
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		} ?>
	</div>
</div>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

// get_footer( 'shop' );
