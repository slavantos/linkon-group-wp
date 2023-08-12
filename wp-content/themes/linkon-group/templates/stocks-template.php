<?php /**
 * Template Name: Акции
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

<section class=" min-height">
	<div class="container">
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
				<?php echo do_shortcode('[sale_products per_page="12"]'); ?>
			</div>
		</div>
		
	</div>
</section>

 <?php get_footer(); ?>