<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>

<div class="single-product-gallery">
	<?php if ( $product->is_on_sale() ) { ?>
		<div class="single-product__sale">
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
  <div class="single-product-gallery__flex">
  	<div class="single-product-gallery__images">
    	<?php if (count($product->get_gallery_image_ids()) > 0): ?>
    		<div class="single-product-gallery__prev"><img src="<?php echo get_template_directory_uri()?>/img/arrow-gallery.svg" alt=""></div>
    	<?php endif; ?>
      <div class="swiper-container">
         <div class="swiper-wrapper">
          	
            <?php
			global $product;

				$attachment_ids = $product->get_gallery_image_ids();
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
				echo '<div class="swiper-slide single-product-gallery__images__slide">';
					echo "<a href='" .$thumb[0] ."' data-fancybox='gallery'>";
				    echo "<img src='" .$thumb[0] ."'>";
				    echo "</a>";
				    echo '</div>';
				foreach ( $attachment_ids as $attachment_id ) {
					echo '<div class="swiper-slide single-product-gallery__images__slide">';
				    $full_src = wp_get_attachment_image_src( $attachment_id, 'full' );
				    echo "<a href='" .$full_src[0] ."' data-fancybox='gallery'>";
				    echo "<img src='" .$full_src[0] ."'>";
				    echo "</a>";
				    echo '</div>';
				}
			?>
	        
          </div>
      </div>
      <?php if (count($product->get_gallery_image_ids()) > 0): ?>
    		<div class="single-product-gallery__next"><img src="<?php echo get_template_directory_uri()?>/img/arrow-gallery.svg" alt=""></div> 
    	<?php endif; ?>
    </div>

    <?php if (count($product->get_gallery_image_ids()) > 0): ?>
    	<div class="single-product-gallery__col">

	      <div class="single-product-gallery__prev"><img src="<?php echo get_template_directory_uri()?>/img/arrow-gallery.svg" alt=""></div>

	      <div class="single-product-gallery__thumbs">
	        <div class="swiper-container">
	          <div class="swiper-wrapper">
	          	
	            <?php
				global $product;

					$attachment_ids = $product->get_gallery_image_ids();
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
					echo '<div class="swiper-slide single-product-gallery__slide">';
					    echo "<img src='" .$thumb[0] ."'>";
					    echo '</div>';
					foreach ( $attachment_ids as $attachment_id ) {
						echo '<div class="swiper-slide single-product-gallery__slide">';
					    $full_src = wp_get_attachment_image_src( $attachment_id, 'full' );
					    echo "<img src='" .$full_src[0] ."'>";
					    echo '</div>';
					}
				?>
		        
	          </div>
	        </div>
	      </div>

	      <div class="single-product-gallery__next"><img src="<?php echo get_template_directory_uri()?>/img/arrow-gallery.svg" alt=""></div> 

	    </div>
    <?php endif; ?>

  </div>
</div>
