<?php /**
 * Template Name: категории на главной
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

<section class="other-category">
	<div class="container">
		<h2>
			<?php the_title(); ?>
		</h2>
	 	<?php the_content(); ?>
	</div>
</section>

 <?php get_footer(); ?>