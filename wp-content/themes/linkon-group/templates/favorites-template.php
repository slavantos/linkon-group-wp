<?php /**
 * Template Name: Избранное
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

 <section class="favorites min-height">
 	<div class="container">
	 	<?php the_content(); ?>
	 </div>
 </section>

 <?php get_footer(); ?>