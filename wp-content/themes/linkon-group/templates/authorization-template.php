<?php /**
 * Template Name: авторизация
 */ get_header();?>

<div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
</div>

<section class="authorization-section min-height">
	<div class="container">
 		<?php the_content(); ?>
 	</div>
</section>

<?php get_footer(); ?>