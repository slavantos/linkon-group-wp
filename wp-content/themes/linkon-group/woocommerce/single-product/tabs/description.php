<?php

/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined('ABSPATH') || exit;

global $post;

$heading = apply_filters('woocommerce_product_description_heading', __('Description', 'woocommerce'));

?>

<?php if ($heading) : ?>
	<h2><?php echo esc_html($heading); ?></h2>
<?php endif; ?>

<?php the_content(); ?>

<?php
if (get_field('single_advantages')) { ?>
	<div class="single__advantages">
		<h4>Преимущества</h4>
		<?php the_field('single_advantages'); ?>
	</div>
<?php }
?>
<?php
global $product;
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

<div class="single__note">
	*Производитель оставляет за собой право без уведомления дилера менять характеристики, внешний вид, комплектацию товара и место его производства. Указанная информация не является публичной офертой
</div>