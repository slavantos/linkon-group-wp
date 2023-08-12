<?php /**
 * Template Name: Корзина
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

 <section class="min-height cart-page">
 	<div class="container">
	 	<?php the_content(); ?>
	 </div>
 </section>

 <?php get_footer(); ?>