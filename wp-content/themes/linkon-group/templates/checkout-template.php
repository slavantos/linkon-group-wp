<?php /**
 * Template Name: Оформление заказа
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

 <section class="min-height checkout-page">
 	<div class="container">
	 	<?php the_content(); ?>
	 </div>
 </section>

 <?php get_footer(); ?>