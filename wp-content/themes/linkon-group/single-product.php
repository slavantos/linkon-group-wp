<?php get_header(); ?>

<div class="breads">
	<div class="container">
		<?php woocommerce_breadcrumb(); ?>
	</div>
</div>

<section class="single">
	<div class="container">
		<?php if ( is_singular( 'product' ) ) {
			woocommerce_content();
		}else{
			woocommerce_get_template( 'archive-product.php' );
		} ?>
	</div>
</section>

<?php get_footer(); ?>