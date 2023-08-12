<?php /**
 * Template Name: Политика конфиденциальности
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

<section class="page-privacy-policy min-height">
	<div class="container">
		<h2>
			<?php the_title(); ?>
		</h2>
		<div class="body">
			<?php the_content(); ?>
		</div>
	</div>
</section>

 <?php get_footer(); ?>